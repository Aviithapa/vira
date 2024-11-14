<?php

namespace App\Http\Controllers\Web;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepository;
use App\Repositories\StudentForm\StudentFormRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentFormController extends Controller
{
    //
    private $studentFormRepository;
    protected $fileUploader;
    protected $mediaRepository;
    public function __construct(
        Request $request,
        StudentFormRepository $studentFormRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository
    ) {
         $this->studentFormRepository = $studentFormRepository;
         $this->fileUploader = $fileUploader;
         $this->mediaRepository = $mediaRepository;
       
        parent::__construct();
    }

    public function store(Request $request)
    {
         // Validate the form data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'district' => 'required|string|max:100',
            'mobile_number' => 'required|string|max:15',
            'email' => 'required|email|max:100',
            'photo' => 'nullable|image|max:2048', // optional photo field
            'gender' => 'required|in:Male,Female,Other',
            'program' => 'required|string|max:100',
            'shift' => 'required|string|max:50',
            'college_name' => 'required|string|max:100',
            'school_type' => 'required|string|max:100',  // school type added to validation
            'father_name' => 'nullable|string|max:100',   // father/mother name
            'father_contact' => 'nullable|string|max:15', // father/mother contact number
            'notes' => 'nullable|string|max:255',         // notes field
            'terms_accepted' => 'accepted', // Ensure the checkbox is checked
        ]);

        $validatedData['terms_accepted'] = $request->has('terms_accepted') ? 1 : 0;


        DB::beginTransaction(); // Start a transaction

        try {
            // Save basic form data
            $studentForm = $this->studentFormRepository->store($validatedData);

            // Save the uploaded photo if available
            if ($request->hasFile('photo')) {
                // Use fileUploader service to upload the photo and get the path
                $response = $this->fileUploader->upload($request->file('photo'), 'student-form');
                $studentForm->photo = $response['path'];
                $studentForm->save();

                // Store media details using mediaRepository
                $response['post_id'] = $studentForm->id;
                $this->mediaRepository->store($response);
            }

            DB::commit(); // Commit the transaction if everything is successful

            // Redirect with a success message
            return redirect()->back()->with('success', 'Form has been submitted successfully will reach you soon.');
        } catch (Exception $e) {
            dd($e);
            DB::rollBack(); // Rollback the transaction if an error occurs
            return redirect()->back()->withErrors(['error' => 'Failed to register student. Please try again.'])->withInput();
        }
    }

    
}
