<?php

use App\Http\Controllers\StudentMarksController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/dashboard','/students');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth'], 'as' => 'admin.'], function () {

    Route::resource('students', StudentsController::class);
    Route::resource('student-marks', StudentMarksController::class);

});