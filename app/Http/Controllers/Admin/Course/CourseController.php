<?php

namespace App\Http\Controllers\Admin\Course;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Repositories\Advisor\AdvisorRepository;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Media\MediaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    protected $courseRepository;

    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
    CourseRepository $courseRepository,
    FileUploaderInterface $fileUploader,
    MediaRepository $mediaRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
    }

    public function index(Request $request)
    {
        $courses = $this->courseRepository->getPaginatedList($request);
        return view('admin.pages.course.index', compact('courses', 'request'));
    }

    public function create()
    {
        $advisors = CourseCategory::all();
        return view('admin.pages.course.create', compact('advisors'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();
            $data['category'] = 'learning';
            $data['rating'] = 5;
            $data['num_ratings']  = 100;
            $data['language']  = 'english';
            $course = $this->courseRepository->store($data);
            if (isset($data['file'])) {
                $response = $this->fileUploader->upload($data['file'], "course");
                $course->image = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['academic_content_url'])) {
                $response = $this->fileUploader->upload($data['academic_content_url'], "course");
                $course->academic_content_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['syllabus_url'])) {
                $response = $this->fileUploader->upload($data['syllabus_url'], "course");
                $course->syllabus_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['notes_url'])) {
                $response = $this->fileUploader->upload($data['notes_url'], "course");
                $course->notes_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['mcq_url'])) {
                $response = $this->fileUploader->upload($data['mcq_url'], "course");
                $course->mcq_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            

            DB::commit();
            session()->flash('success', 'Course has been created successfully.');
            return redirect()->route('course.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $course = $this->courseRepository->findOrFail($id);
        $advisors = CourseCategory::all();
        return view('admin.pages.course.edit', compact('course', 'advisors'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();

            $course = $this->courseRepository->update($id, $data);


            if (isset($data['file'])) {
                $response = $this->fileUploader->upload($data['file'], "course");
                $course = $this->courseRepository->findOrFail($id);
                $course->image = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['academic_content_url'])) {
                $response = $this->fileUploader->upload($data['academic_content_url'], "course");
                $course = $this->courseRepository->findOrFail($id);
                $course->academic_content_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['syllabus_url'])) {
                $response = $this->fileUploader->upload($data['syllabus_url'], "course");
                $course = $this->courseRepository->findOrFail($id);
                $course->syllabus_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['notes_url'])) {
                $response = $this->fileUploader->upload($data['notes_url'], "course");
                $course = $this->courseRepository->findOrFail($id);
                $course->notes_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }

            if (isset($data['mcq_url'])) {
                $response = $this->fileUploader->upload($data['mcq_url'], "course");
                $course = $this->courseRepository->findOrFail($id);
                $course->mcq_url = $response['path'];
                $course->save();
                $response['course_id'] = $course->id;
                $this->mediaRepository->store($response);
            }
            DB::commit();

            session()->flash('success', 'Course has been updated successfully.');
            return redirect()->route('course.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->courseRepository->delete($id);

            session()->flash('success', 'Course has been deleted successfully.');
            return redirect()->route('course.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
