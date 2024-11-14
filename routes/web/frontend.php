<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\StudentFormController;

Route::post('register', [HomeController::class, 'register'])->name('register');
Route::post('inquiry', [HomeController::class, 'storeInquiry'])->name('store.inquiry');
Route::get('news-details/{id}', [HomeController::class, 'getSingleNews'])->name('single.news');
Route::get('course-details/{id}', [HomeController::class, 'getSingleCourse'])->name('course-details');
Route::post('subscribe-newsletter', [HomeController::class, 'subscribeNewsLetter'])->name('subscribe.news-letter');
Route::post('contact', [HomeController::class, 'storeContactUsForm'])->name('contact');
Route::post('/student-forms', [StudentFormController::class, 'store'])->name('student_forms.store');


Route::match(['get', 'post'], '/{slug}', [HomeController::class, 'slug'])->where('slug', '.*');
