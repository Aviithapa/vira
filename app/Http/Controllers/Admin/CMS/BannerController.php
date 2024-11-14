<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Repositories\CMS\Post\PostRepository;
use App\Repositories\Media\MediaRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
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
        $banner = $this->postRepository->findBy('type', 'homepage_banner')->first();
        return view('admin.pages.cms.banner.index', compact('banner', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.cms.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBannerRequest $request)
    {
        //
        $data = $request->all();
         try {
            DB::beginTransaction();
            $data['type'] = 'homepage_banner';
            $data['slug'] = generateSlug($data['title']);
            if($data['id']){
                $this->postRepository->update($data['id'], $data );
                $banner = $this->postRepository->findOrFail($data['id']); // Retrieve the updated banner instance

            }else{
                $banner = $this->postRepository->store($data);
            }
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            if (isset($data['file'])) {
                $response =  $this->fileUploader->upload($data['file'], "banner");
                $banner->image = $response['path'];
                $banner->save();
                $response['post_id'] = $banner->id;
                $this->mediaRepository->store($response);
            };
            DB::commit();
            session()->flash('success', 'Banner has been created successfully.');
            return redirect()->route('banner.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = $this->postRepository->findOrFail($id);
        return view('admin.pages.cms.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['slug'] = generateSlug($data['title']);
            $banner = $this->postRepository->update($id, $data);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            if (isset($data['file'])) {
                $response =  $this->fileUploader->upload($data['file'], "banner");
                $banner = $this->postRepository->findOrFail($id);
                $banner->image = $response['path'];
                $banner->save();
                $response['post_id'] = $id;
                $this->mediaRepository->store($response);
            };
            DB::commit();
            session()->flash('success', 'banner has been updated successfully.');
            return redirect()->route('banner.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $banner = $this->postRepository->delete($id);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'banner has been deleted successfully.');
            return redirect()->route('banner.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
