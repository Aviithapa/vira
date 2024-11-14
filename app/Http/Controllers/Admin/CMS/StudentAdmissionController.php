<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Mail\AdminCreateUser;
use App\Models\Role;
use App\Models\StudentForm;
use App\Repositories\Media\MediaRepository;
use App\Repositories\StudentForm\StudentFormRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Google\Service\Classroom\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StudentAdmissionController extends Controller
{
    protected $studentFormRepository;
    protected $fileUploader;
    protected $mediaRepository;
    protected $userRepository;

    public function __construct(
        StudentFormRepository $studentFormRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository,
        UserRepository $userRepository
    ) {
        $this->studentFormRepository = $studentFormRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
        $this->userRepository = $userRepository;
    }


   /**
     * Display a listing of the students.
     */
    public function index(Request $request)
    {
        // Fetch the paginated list of student admissions
        $students = $this->studentFormRepository->getPaginatedList($request);
        return view('admin.pages.student.index', compact('students', 'request'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('admin.pages.cms.student.create');
    }


    /**
     * Show the form for editing the specified student.
     */
    public function edit(string $id)
    {
        $student = $this->studentFormRepository->findOrFail($id);
        return view('admin.pages.cms.student.edit', compact('student'));
    }

    public function show(string $id)
    {
        $student = $this->studentFormRepository->findOrFail($id);
        return view('admin.pages.student.show', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();

            // Update the student record
            $student = $this->studentFormRepository->update($id, $data);
            if ($student == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            // If file is updated, upload new file and update student record
            if (isset($data['file'])) {
                $response = $this->fileUploader->upload($data['file'], "student");
                $student = $this->studentFormRepository->findOrFail($id);
                $student->image = $response['path'];
                $student->save();
                $response['student_id'] = $id;
                $this->mediaRepository->store($response);
            }

            DB::commit();
            session()->flash('success', 'Student has been updated successfully.');
            return redirect()->route('student.index');

        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(string $id)
    {
        try {
            $student = $this->studentFormRepository->delete($id);
            if ($student == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Student has been deleted successfully.');
            return redirect()->route('student.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Generate login credentials and create a new student user.
     */
    public function generateLoginCredentials($id)
    {
        // Retrieve student data using repository
        $data = $this->studentFormRepository->findOrFail($id); 
        
        try {
            DB::beginTransaction(); // Start a transaction to ensure data integrity
            
            // Generate a random 4-digit token (used for phone_number or reference)
            $token = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            
            // Generate a username based on first and last names (adjust as necessary)
            $username = strtolower($data['first_name'] . '.' . $data['last_name']);
            
            // Generate a random password (8 characters long)
            $password = $this->generateRandomAlphabeticString(8); 
            
            // Hash the generated password before saving
            $hashedPassword = bcrypt($password);
            
            // Prepare student data for the user creation process
            $student = [
                'username' => $username,
                'email' => $data['email'],  // Use student's email for login
                'token' => $token,          // Store token (e.g., phone number reference)
                'password' => $hashedPassword,
                'phone_number' => $token,   // Token used as phone number for reference
                'reference' => $password,
                'status' => 'active'   // Original password for reference (not hashed)
            ];
            
            // Retrieve the 'student' role
            $role = Role::where('name', 'student')->first();
            if (!$role) {
                session()->flash('danger', 'Role not found.');
                return redirect()->back();
            }
    
            // Create the new student user in the users table
            $user = $this->userRepository->store($student); 
            
            if (!$user) {
                session()->flash('danger', 'Oops! Something went wrong while creating the user.');
                DB::rollBack();  // Rollback transaction if user creation fails
                return redirect()->back()->withInput();
            }
    
            // Attach the 'student' role to the newly created user
            $user->roles()->attach($role);
    
            // Mark the student's form as having login credentials generated
            $data->login_credentials_generated = true;
            $data->user_id = $user->id;

            $data->save();
    
            // Send a welcome email with the login credentials
            // Mail::to($user->email)->send(new AdminCreateUser($user));
    
            // Commit the transaction to save all changes
            DB::commit();
    
            // Success message and redirect
            session()->flash('success', 'Student account has been created successfully, and login credentials have been sent.');
            return redirect()->route('dashboard.user.index');
        } catch (Exception $e) {
            DB::rollBack(); // Ensure transaction is rolled back if an error occurs
            session()->flash('danger', 'Oops! Something went wrong: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    
    

    /**
     * Helper function to generate a random alphabetic string of a given length.
     */
    private function generateRandomAlphabeticString($length = 8)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }
}
