<?php

use App\Http\Controllers\StudentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register-student', [StudentApiController::class, "registerStudent"]);
Route::post('login', [StudentApiController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('examinee', [StudentApiController::class, 'examinee']);
    Route::post('fetchQuestion', [StudentApiController::class, 'fetchQuestion']);
    Route::post('saveQuestion', [StudentApiController::class, 'saveQuestion']);
    Route::post('confirmStudent', [StudentApiController::class, 'confirmStudent']);
    Route::post('saveAnswer', [StudentApiController::class, 'saveAnswer']);
    Route::post('fetchQuestionExam', [StudentApiController::class, 'fetchQuestionExam']);

    Route::post('getCheckStudentExam', [StudentApiController::class, 'getCheckStudentExam']);

    Route::post('getResult', [StudentApiController::class, 'getResult']);
    Route::post('getStudentResult', [StudentApiController::class, 'getStudentResult']);
});
