<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Repositories\CMS\Post\PostRepository;
use App\Repositories\Media\MediaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    protected $postRepository;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        PostRepository $postRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository
    ) {
        $this->postRepository = $postRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $about = $this->postRepository->all()->where('type', 'about')->first();
        return view('admin.pages.cms.about.index', compact('about', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBannerRequest $request)
    {
        //
        $data = $request->all();
         try {
            DB::beginTransaction();
            $data['type'] = 'about';
            $data['slug'] = generateSlug($data['title']);
            if($data['id']){
                $this->postRepository->update($data['id'], $data );
                $about = $this->postRepository->findOrFail($data['id']); // Retrieve the updated About instance

            }else{
                $about = $this->postRepository->store($data);
            }
            if ($about == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            if (isset($data['file'])) {
                $response =  $this->fileUploader->upload($data['file'], "about");
                $about->image = $response['path'];
                $about->save();
                $response['post_id'] = $about->id;
                $this->mediaRepository->store($response);
            };
            DB::commit();
            session()->flash('success', 'About has been created successfully.');
            return redirect()->route('about.index');
        } catch (Exception $e) {
             DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

}
