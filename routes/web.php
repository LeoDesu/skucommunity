<?php

use App\Http\Controllers\API\GetDataController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Data\DeleteDataController;
use App\Http\Controllers\Data\UpdateDataController;
use App\Http\Controllers\Auth\AddUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CreateBlogController;

use App\Http\Controllers\Data\InsertDataController;
use App\Http\Controllers\Data\ShowDataController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ScheduleController;

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
    if(Auth::user()){
        return redirect('/home');
    }else{
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::patch('/updateprofile/{user}', [App\Http\Controllers\ProfileController::class, 'update']);

//blog controll
Route::get('/createblog', [CreateBlogController::class, 'create']);
Route::post('/createblog', [CreateBlogController::class, 'store']);
Route::get('/trending', [BlogController::class, 'trending'])->name('trending');
Route::get('/latest', [BlogController::class, 'latest'])->name('latest');
Route::get('/announcements', [BlogController::class, 'announcements'])->name('announcements');
Route::get('/myclass', [BlogController::class, 'myclass']);
Route::get('/blog/{blog}', [BlogController::class, 'viewBlog']);
Route::get('/getupvotes/{blog}', [BlogController::class, 'getUpvotes']);
Route::post('/upvote', [BlogController::class, 'upvote']);
Route::get('/getdownvotes/{blog}', [BlogController::class, 'getDownvotes']);
Route::post('/downvote', [BlogController::class, 'downvote']);
Route::post('/comment/{blog}', [BlogController::class, 'comment']);

//shows
Route::get('/showschedule/{date}', [ScheduleController::class, 'index']);
Route::get('/showschedule', [ScheduleController::class, 'index']);
Route::get('/showteachschedule', [ScheduleController::class, 'showTeach']);
Route::get('/showtodayschedule', [ScheduleController::class, 'showToday']);
Route::get('/show-teaching-info', [ShowDataController::class, 'showTeaching']);
Route::get('/subjectinfos', [ShowDataController::class, 'showSubjects']);
Route::get('/classroominfos', [ShowDataController::class, 'showClassrooms']);

//admin
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/adduser', [AddUserController::class, 'index']);
Route::post('/adduser', [AddUserController::class, 'create']);
Route::get('/manageteaching', [AdminController::class, 'manageTeaching']);
Route::post('/manageteaching', [AdminController::class, 'manageTeachingFor']);
Route::get('/managesubjects', [AdminController::class, 'manageSubjects']);
Route::post('/managesubjects', [AdminController::class, 'manageSubjectsFor']);
Route::get('/manageschedules', [ScheduleController::class, 'manageSchedulesSelectMajor']);
Route::get('/manageschedules/{major_id}', [ScheduleController::class, 'manageSchedules']);
Route::get('/manageschedules/{major_id}/{date}', [ScheduleController::class, 'manageSchedulesDate']);
Route::post('/manageschedules', [AdminController::class, 'manageSchedulesFor']);
Route::get('/userinfo', [AdminController::class, 'userInfo']);
Route::get('/showuserinfo/{user}', [AdminController::class, 'showUserInfo']);

Route::get('/insertdata', [InsertDataController::class, 'index']);
Route::post('/insertsubject', [InsertDataController::class, 'insertSubject']);
Route::post('/insertmajor', [InsertDataController::class, 'insertMajor']);
Route::post('/insertclassroom', [InsertDataController::class, 'insertClassroom']);
Route::get('/insertschedule', [InsertDataController::class, 'insertSchedulePage']);
Route::post('/insertschedule', [InsertDataController::class, 'insertSchedule']);
Route::post('/insertschedule', [InsertDataController::class, 'insertSchedule']);

Route::get('/schedule/{schedule}/edit', [UpdateDataController::class, 'editSchedule']);
Route::patch('/schedule/{schedule}', [UpdateDataController::class, 'updateSchedule']);
Route::get('/managemajor/{major}', [UpdateDataController::class, 'manageMajor']);
Route::post('/update-quota/{major}', [UpdateDataController::class, 'updateQuota']);

Route::delete('/schedule/{schedule}', [DeleteDataController::class, 'deleteSchedule']);
Route::delete('/deleteuser/{user}', [DeleteDataController::class, 'deleteUser']);
Route::delete('/deletesubject/{subject}', [DeleteDataController::class, 'deleteSubject']);
Route::delete('/deleteclassroom/{classroom}', [DeleteDataController::class, 'deleteClassroom']);

//API
Route::get('/getfaculties', [GetDataController::class, 'faculties']);
Route::get('/getmajors/{faculty}', [GetDataController::class, 'majors']);
Route::get('/getbuildings', [GetDataController::class, 'buildings']);
Route::get('/getclassrooms/{building}', [GetDataController::class, 'classrooms']);
Route::get('/getsubjects/{major_id}', [GetDataController::class, 'subjects']);
Route::get('/getteachers/{subject_id}', [GetDataController::class, 'teachers']);
Route::get('/getuser/{id}', [GetDataController::class, 'user']);
Route::get('/getunreadnotifications/{user}', [NotificationController::class, 'getUnread']);
Route::post('/readnotification', [NotificationController::class, 'read']);
Route::post('/calcelteaching/{id}', [ScheduleController::class, 'cancelTeaching']);
Route::get('/allusers', [GetDataController::class, 'allusers']);
Route::get('/allteachers', [GetDataController::class, 'allteachers']);
Route::get('/allstudents', [GetDataController::class, 'allstudents']);

//search
Route::get('/searchusers/{search}', [GetDataController::class, 'searchusers']);
Route::get('/searchteachers/{search}', [GetDataController::class, 'searchteachers']);
Route::get('/searchstudents/{search}', [GetDataController::class, 'searchstudents']);
Route::get('/searchsubjects/{search}', [GetDataController::class, 'searchsubjects']);