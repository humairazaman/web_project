<?php

use App\Http\Controllers\DramaController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MailCrudController;
use App\Http\Controllers\ProjectController;

//mail route
use Illuminate\Support\Facades\Mail;
use App\Mail\form_mail;

//method 1
// Route::get('/send_mail', function(){Mail::to('humairazaman823@gmail.com')->send(new form_mail());});
//method 2
Route::get('/mail_form', [MailController::class, 'open_form'])->name('mail_form');
Route::post('/send_mail', [MailController::class, 'send_mail'])->name('send_mail');

Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('student/read', [StudentController::class, 'read'])->name('student.read');
Route::get('student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('student/{student}/update', [StudentController::class, 'update'])->name('student.update');
Route::delete('student/{cnic}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('student/upload', [FileController::class, 'open_file_form'])->name('student.upload');
Route::post('/file_store', 'App\Http\Controllers\FileController@store_file');
Route::get('student/show', [FileController::class, 'show_file_data'])->name('student.showfile');
Route::get('view/{id}', [FileController::class, 'file_view'])->name('file_view');
Route::get('download_file/{file}', [FileController::class, 'file_download']);

Route::get('project/data', [ProjectController::class, 'data'])->name('project.data');
Route::post('project/store', [ProjectController::class, 'store']);
Route::get('project/display', [ProjectController::class, 'display'])->name('project.display');


Route::get('/', [DramaController::class, 'index'])->name('intro');
Route::get('drama', [DramaController::class, 'show'])->name('drama.display');
Route::get('drama/detail/{id}', [DramaController::class, 'getDramaDetails'])->name('drama.detail.display');
Route::get('/drama/{day}/{time}', [DramaController::class, 'getDramaByDayAndTime'])->name('drama.DayAndTime');
Route::get('drama/subscribe', [DramaController::class, 'subscribe'])->name('drama.subscribe');
Route::post('drama/subscribe/store', [DramaController::class, 'subscribeStore'])->name('drama.subscribe.store');


Route::prefix('admin/drama')->group(function () {
    Route::get('', [DramaController::class, 'adminDramaDisplay'])->name('admin.drama.display');
    Route::get('/manage', [DramaController::class, 'adminDramaManage'])->name('admin.drama.manage');
    Route::get('/create', [DramaController::class, 'adminDramaCreate'])->name('admin.drama.create');
    Route::get('/edit/{id}', [DramaController::class, 'adminDramaEdit'])->name('admin.drama.edit');
    Route::post('/store', [DramaController::class, 'adminDramaStore'])->name('admin.drama.store');
    Route::post('/update/{id}', [DramaController::class, 'adminDramaUpdate'])->name('admin.drama.update');
    Route::delete('/destroy/{id}', [DramaController::class, 'adminDramaDestroy'])->name('admin.drama.destroy');
});


// **************************************************************************************************************************


Route::get('admin/drama/episode/create/{drama}', [EpisodeController::class, 'create'])->name('episode.create');
Route::post('admin/drama/episode/create/{drama}', [EpisodeController::class, 'store'])->name('episode.store');
Route::get('admin/drama/episodes/{drama}', [EpisodeController::class, 'episodeManage'])->name('episode.manage');
Route::get('admin/drama/{drama}/episode/edit/{episode}', [EpisodeController::class, 'edit'])->name('episode.edit');
Route::put('admin/drama/{drama}/episode/update/{episode}', [EpisodeController::class, 'update'])->name('episode.update');
Route::delete('admin/drama/episode/delete/{episode}', [EpisodeController::class, 'destroy'])->name('episode.destroy');


// **************************************************************************************************************************


Route::get('/email-form', [MailController::class, 'showEmailForm'])->name('email-form');
Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');


// **************************************************************************************************************************


Route::prefix('admin/drama')->group(function () {
    Route::get('/emails/manage', [MailCrudController::class, 'manage'])->name('mails.manage');
    Route::get('/emails/subscribe', [MailCrudController::class, 'create'])->name('mails.subscribe');
    Route::post('/emails/store', [MailCrudController::class, 'store'])->name('mails.store');
    Route::get('/emails/edit/{mail}', [MailCrudController::class, 'edit'])->name('mails.edit');
    Route::put('/emails/update/{mail}', [MailCrudController::class, 'update'])->name('mails.update');
    Route::delete('/emails/destroy/{mail}', [MailCrudController::class, 'destroy'])->name('mails.destroy');
});

// **************************************************************************************************************************





