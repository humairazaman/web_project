<?php

use App\Http\Controllers\DramaController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\ProjectController;


//mail route
use Illuminate\Support\Facades\Mail;
use App\Mail\form_mail;

//method 1
// Route::get('/send_mail', function(){Mail::to('humairazaman823@gmail.com')->send(new form_mail());});
//method 2
Route::get('/mail_form', [mailController::class, 'open_form'])->name('mail_form');
Route::post('/send_mail', [mailController::class, 'send_mail'])->name('send_mail');




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

Route::get('drama', [DramaController::class, 'index'])->name('drama.display');
Route::get('/drama/create', [DramaController::class, 'create'])->name('drama.create');
Route::post('/drama/store', [DramaController::class, 'store'])->name('drama.store');


Route::get('/drama/{day}/{time}', [DramaController::class, 'getDramaByDayAndTime'])->name('drama.DayAndTime');

Route::prefix('admin')->group(function () {
    Route::get('/display', [DramaController::class, 'adminIndex'])->name('admin.display');
    Route::get('/create', [DramaController::class, 'adminCreate'])->name('admin.create');
    Route::get('/edit/{id}', [DramaController::class, 'adminEdit'])->name('admin.edit');
    Route::post('/update/{id}', [DramaController::class, 'adminUpdate'])->name('admin.update');
    Route::delete('/destroy/{id}', [DramaController::class, 'adminDestroy'])->name('admin.destroy');
}); 

