<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Inquiry\CreateInquiryRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Repositories\CMS\Post\PostRepository;
use App\Repositories\College\CollegeRepository;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Inquiry\InquiryRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\NewsLetterSubscribe\NewsLetterSubscribeRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    //

    private $viewData;
    private $postRepository;
    private $request;
    private $inquiryRepository;
    private $newsLetterSubscribeRepository;
    private $contactRepository;
    private $newsRepository;
    private $collegeRepository;
    private $courseRepository;



    public function __construct(
        Request $request,
        PostRepository $postRepository,
        InquiryRepository $inquiryRepository,
        NewsLetterSubscribeRepository $newsLetterSubscribeRepository,
        ContactRepository $contactRepository,
        NewsRepository $newsRepository,
        CollegeRepository $collegeRepository,
        CourseRepository  $courseRepository,

    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->inquiryRepository = $inquiryRepository;
        $this->newsLetterSubscribeRepository = $newsLetterSubscribeRepository;
        $this->contactRepository = $contactRepository;
        $this->newsRepository = $newsRepository;
        $this->collegeRepository = $collegeRepository;
        $this->courseRepository =  $courseRepository;
        parent::__construct();
    }

    public function getSingleCourse($id)
    {
        $this->viewData['course'] = $this->courseRepository->findOrFail($id);
        // $this->viewData['discount'] = $this->postRepository->findBy('id', 15, ['title', 'image', 'content', 'excerpt']);
        return view('website.pages.course-details',  $this->viewData);
    }


    public function slug($slug = null)
    {
        $slug = $slug ? $slug : 'index';
        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'website/pages' . DIRECTORY_SEPARATOR . $slug . '.blade.php';
        $this->viewData['pageData'] = $this->postRepository->findBy('slug', $slug);
        $this->viewData['clients'] = $this->postRepository->all()->where('type', 'clients');
        $this->viewData['slug'] = $slug;
        $this->viewData['heading_team'] = $this->postRepository->findBy('id', 19, ['title', 'content', 'excerpt']);
        $this->viewData['heading_blog'] = $this->postRepository->findBy('id', 20, ['title', 'content', 'excerpt']);
        $this->viewData['discount'] = $this->postRepository->findBy('id', 15, ['title', 'image', 'content', 'excerpt']);
        if (file_exists($file_path) && $this->viewData['pageData']) {
            switch ($slug) {
                case 'index':
                    $this->viewData['banners'] = $this->postRepository->all()->where('type', 'homepage_banner')->first();;
                    $this->viewData['about'] = $this->postRepository->all()->where('type', 'about')->first();;
                    $this->viewData['message'] = $this->postRepository->all()->where('meta_link','message')->first();
                    break;
                
                case 'about':
                    $this->viewData['about'] = $this->postRepository->all()->where('type', 'about')->first();;
                    break;
                
                case 'online-form':
                    $this->viewData['program'] = Course::all();;
                    break;


                case 'gallary': 
                        $this->viewData['gallery'] = $this->postRepository->all()->where('type', 'gallery');
                        break;

                
                case 'contact':
                    
                    break;

                    case 'student-join':
                        $this->viewData['categories'] = CourseCategory::with('courses')->where('is_show_to_tab', true)->get();

                        break;
                default:
                    return view('website.pages.' . $slug,  $this->viewData);
                break;
            }
            return view('website.pages.' . $slug,  $this->viewData);
        }
        return view('website.pages.404');
    }


    public function storeInquiry(CreateInquiryRequest $request){
        $data = $request->all();
        try {
            DB::beginTransaction();
            $inquiry = $this->inquiryRepository->store($data);
            if ($inquiry === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            DB::commit();
            session()->flash('success', 'Your request has been submitted successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }


    public function getSingleNews($id)
    {
        $this->viewData['news'] = $this->newsRepository->findBy('id', $id);
        return view('website.pages.news-details',  $this->viewData);
    }

    public function subscribeNewsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);
        $data = $request->all();
        try {
            DB::beginTransaction();
            $inquiry = $this->newsLetterSubscribeRepository->store($data);
            if ($inquiry === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            DB::commit();
            session()->flash('success_news', 'Your request has been submitted successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    public function storeContactUsForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'phone', 'message');
        try {
            DB::beginTransaction();
            $inquiry = $this->contactRepository->store($data);
            if ($inquiry === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            DB::commit();
            session()->flash('success_contact', 'Your request has been submitted successfully.');
            return redirect()->back()->with('success', 'Your request has been submitted successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
