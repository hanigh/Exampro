<?php

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



Route::get('/', 'ExamController@listExam');


//questions
Route::post('ques/add', 'QuesController@storeQues')->name('ques.postAdd');
Route::post('ques/update', 'QuesController@updateQues')->name('ques.postUpdate');
Route::post('ques/deleteQues', 'QuesController@deleteQues')->name('ques.deleteQues');


//exam
Route::get('exam/addNewID', 'ExamController@addNewExamID')->name('exam.newidQues');
Route::get('exam/add/{id}', 'ExamController@addExam')->name('exam.add');
Route::get('exam/list', 'ExamController@listExam')->name('exam.list');
Route::post('exam/changeName}', 'ExamController@changeExamName')->name('exam.changeName');

//user exam
Route::get('user/exam/list', 'ExamController@UserlistExam')->name('user.exam.list');
Route::get('user/exam/start/{id}', 'ExamController@UserStartExam')->name('user.exam.open');


Route::get('/setup', 'PhotoController@index');


