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


Route::get('test', function () {
    return view('test');
});

#Route::get('new', function () {
#   return view('new');
#});

Route::get('/', function () {
   # return view('welcome4')->with([
   #     'message'=>'你已经提交申请，请您耐心等待！',
   #     'url'=>'http://tian.com:5000',
   #     'jumpTime'=>3,
   # ]);
   return view('welcome');
});
Route::get('/new', 'StaticController@index')->name('new');
Route::get('/test', 'StaticController@test')->name('test');
Route::get('/new/{age}', 'StaticController@index')->middleware(\App\Http\Middleware\CheckAge::class);


Route::get('/delete/{ID}','StaticController@delete');
Route::get('/query/{ID}','StaticController@query');
Route::get('/insert/{NAME}/{DESCRIPTION}/{CREDITS}/{MAX}','StaticController@insert');
Route::get('/update/{ID}/{choose}/{updated}','StaticController@update');

Route::apiResource('/login','LoginController')->middleware(\App\Http\Middleware\CrossHttp::class);;
Route::apiResource('/findpsw','PassforgotController')->middleware(\App\Http\Middleware\CrossHttp::class);;
Route::apiResource('/systemlog','SystemlogController')->middleware(\App\Http\Middleware\CrossHttp::class);;



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\autoManagementController;
use App\Http\Controllers\ManualClassManagerController;
Route::get('/AutoCourseManagement', 'AutoManagementController@classManagement');
Route::post('/ClassroomDisplay', 'ClassroomController@DisplayClassroom');

Route::post('/ClassroomAdd', 'ClassroomController@CreateClassroom');

Route::post('/ClassroomModify', 'ClassroomController@UpdateClassroom');

Route::post('/ClassroomSearch', 'ClassroomController@SearchClassroom');

Route::post('/AutoCourseManagement', 'AutoManagementController@classManagement');

Route::post('/CourseManagementDisplay', 'ManualClassManagerController@DisplayManagement');

Route::post('/CourseManagementModify', 'ManualClassManagerController@ManualManage');

Route::post('/CourseManagementSearch','ManualClassManagerController@searchManagement');

Route::post('/ScheduleSearch', 'ManualClassManagerController@SearchSchedule');



use App\Models\Exam;

use App\Http\Controllers\ExamController;
use App\Http\Controllers\AnswerPaperController;

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

Route::get('/exam/create/{paper_id}/{course_id}/{teacher_id}/{start_time}/{end_time}/{state}', [ExamController::class, 'create']);

Route::get('exam/delete/{exam_id}', [ExamController::class, 'delete']);

Route::get('exam/edit/{exam_id}/{paper_id}/{course_id}/{student_id}/{start_time}/{end_time}/{state}/{score}', [ExamController::class, 'edit']);

Route::get('exam/query/{exam_id}', [ExamController::class, 'query']);

Route::get('/stu', 'Selecttabletset@index');

Route::get('/generatePaper/{paper_name}/{course_id}/{teacher_id}/{choose_num}/{judge_num}', 'Selecttabletset@generatePaper');

Route::get('/Selecttableset/{file}', 'Selecttableset@scale_add');
Route::get('examstu/query/{stu_id}',[ExamController::class,'queryexamstu']);
Route::get('answerpaper/query/{stu_id}/{exam_id}',[AnswerPaperController::class,'queryanswer']);

Route::get('/show_choose_questionbyid/{choose_id?}','Selecttabletset@showchoosequesbyid');
Route::get('/show_choose_questionbycid/{course_id?}','Selecttabletset@showchoosequesbycid');
Route::get('/add_choose_question/{choose_id}/{couse_id}/{teacher_id}/{type}/{stem}/{value}/{optionA}/{optionB}/{optionC}/{optionD}/{correct_answer}', 'Selecttabletset@insertchooseques' );
Route::get('/modify_choose_question/{choose_id}/{type}/{stem}/{value}/{optionA}/{optionB}/{optionC}/{optionD}/{correct_answer}', 'Selecttabletset@modifychooseques' );
Route::get('/delete_choose_question/{choose_id}','Selecttabletset@deletechooseques' );


Route::get('/show_judge_questionbyid/{judge_id?}','Selecttabletset@showjudgequesbyid');
Route::get('/show_judge_questionbycid/{judge_id?}','Selecttabletset@showjudgequesbycid');
Route::get('/add_judge_question/{judge_id}/{couse_id}/{teacher_id}/{type}/{stem}/{value}/{correct_answer}', 'Selecttabletset@insertjudgeques' );
Route::get('/modify_judge_question/{judge_id}/{type}/{stem}/{value}/{correct_answer}', 'Selecttabletset@modifyjudgeques' );
Route::get('/delete_judge_question/{judge_id}','Selecttabletset@deletejudgeques' );

Route::get('/show_test_paperbyid/{paper_id}','Selecttabletset@showtestpaperbyid');
Route::get('/show_test_paperbytid/{teacher_id}','Selecttabletset@showtestpaperbytid');
Route::get('/add_test_paper/{paper_id}/{paper_name}/{couse_id}/{teacher_id}/{full_mark}', 'Selecttabletset@inserttestpaper' );
Route::get('/modify_test_paper/{paper_id}/{paper_name}', 'Selecttabletset@modifytestpaper' );
Route::get('/delete_test_paper/{paper_id}','Selecttabletset@deletetestpaper' );

Route::get('/show_test_paper_choose_questionbyid/{paper_id}','Selecttabletset@showtestpaperchoosequestionbyid');
Route::get('/add_test_paper_choose_question/{paper_id}/{choose_id}', 'Selecttabletset@inserttestpaperchoosequestion' );
Route::get('/delete_test_paper_choose_question/{paper_id}/{choose_id?}','Selecttabletset@deletetestpaperchoosequestion' );

Route::get('/show_test_paper_judge_questionbyid/{paper_id}','Selecttabletset@showtestpaperjudgequestionbyid');
Route::get('/add_test_paper_judge_question/{paper_id}/{choose_id}', 'Selecttabletset@inserttestpaperjudgequestion' );
Route::get('/delete_test_paper_judge_question/{paper_id}/{choose_id?}','Selecttabletset@deletetestpaperjudgequestion' );

Route::get('/count');







Route::get('/addanswerchoose/{paper_id}/{exam_id}/{student_id}/{choose_id}/{choose_answer}/{score}','AnswerPaperController@add_choose');
Route::get('/addanswerjudge/{paper_id}/{exam_id}/{student_id}/{judge_id}/{judge_answer}/{score}','AnswerPaperController@add_judge');



Route::get('/exammodifystate/{exam_id}', [ExamController::class, 'modifyexamstate']);
Route::get('/showanswerallstu/{exam_id}', 'AnswerPaperController@showallstu');


Route::get('/scale_add_judge/{course_id}/{teacher_id}/{type}/{stem}/{value}/{correct_answer}', [FileUploadController::class, 'scale_add_judge']);
Route::get('/scale_add_choose/{course_id}/{teacher_id}/{type}/{stem}/{value}/{optionA}/{optionB}/{optionC}/{optionD}/{correct_answer}', [FileUploadController::class, 'scale_add_choose']);
Route::get('examtea/query/{teacher_id}',[ExamController::class,'queryexamtea']);
Route::get('/addanswerpaper/{paper_id}/{exam_id}/{student_id}','AnswerPaperController@create');
Route::get('/addanswercorrectforeachques/{exam_id}','AnswerPaperController@CorrectForEachPage');
Route::get('/examstateupdate',[ExamController::class,'update']);

Route::get('/edit/choose/{choose_id}/{stem}/{value}/{optionA}/{optionB}/{optionC}/{optionD}/{answer}', 'Selecttabletset@edit_choose');
Route::get('/edit/judge/{judge_id}/{stem}/{value}/{answer}', 'Selecttabletset@edit_judge');
Route::get('/search/{course_name}', 'Selecttabletset@search');

Route::get('/search_judge/{course_name}', 'Selecttabletset@search_judge');
Route::get('/search_choose/{course_name}', 'Selecttabletset@search_choose');

Route::get('/choosecompare/{paper_id}/{choose_id}/{student_id}/{exam_id}', 'AnswerPaperController@choose_compare');
Route::get('/judgecompare/{paper_id}/{judge_id}/{student_id}/{exam_id}', 'AnswerPaperController@judge_compare');