<?php

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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/Admin', function () {
    return view('login');
});



// Auth::routes();

//fornt end
Route::get('/', 'FrontController@home')->name('landing');

Route::get('/register', 'FrontController@register')->name('landing.register');
Route::get('/login', 'FrontController@login')->name('landing.login');

Route::get('/institutions/register', 'AuthController@register')->name('register');
Route::post('/institutions/postregister', 'AuthController@postregister')->name('post.register');
Route::get('/institutions/register/activate/{code}', 'AuthController@activate')->name('register.activate');

Route::get('/institutions/login', 'AuthController@login')->name('login');
Route::post('/institutions/postlogin', 'AuthController@postlogin')->name('post.login');

Route::group(['middleware' => ['auth', 'CheckRole:institution']], function() {
    // dashboard
    Route::get('/institutions/dashboard', 'SiswaController@index')->name('institution.dashboard');
    Route::get('/institutions/dashboard/add', 'SiswaController@add');
    Route::post('/institutions/dashboard/postcreate', 'SiswaController@postcreate')->name('institution.create.applicant.data');
    Route::get('/institutions/dashboard/{pelamar}/edit', 'SiswaController@edit');
    Route::post('/institutions/dashboard/{pelamar}/update', 'SiswaController@update');
    Route::get('/institutions/dashboard/{pelamar}/delete', 'SiswaController@delete');

    //logout
    Route::get('/institutions/logout', 'AuthController@logout')->name('institution.logout');

    // mystudent download
    // Route::get('/institutions/dashboard/downloadxlsx', 'SiswaController@downloadexcel');
    // mystudent upload
    Route::post('/institutions/dashboard/importxlsx', 'SiswaController@importexcel')->name('siswa.import');

});

Route::get('getdatasiswa', 'SiswaController@getdatasiswa')->name('ajax.get.data.siswa');

Route::get('jobseekers/signin', 'JobseekersController@signin_jobs')->name('jobseekers.signin');
Route::post('jobseekers/postsignin', 'JobseekersController@post_sign_jobs')->name('jobseekers.post.signin');


Route::group(['middleware' => ['auth', 'CheckRole:pelamar']], function() {
    // job seekers
    Route::get('/jobseeker/online', function () {
        return view('jobseekers.onlinetesting.onlinetesting');
    });

    Route::get('/jobseeker/online-testing', function () {
        return view('jobseekers.onlinetesting.onlineinterview');
    });

    Route::get('/jobseeker/online-testing-result', function () {
        return view('jobseekers.onlinetesting.onlinetestingresult');
    });

    Route::get('/jobseeker/online-interview', function () {
        return view('jobseekers.onlinetesting.onlineinterview');
    });

    Route::get('/jobseeker/online-interview-video', function () {
        return view('jobseekers.onlinetesting.onlineinterviewvideo');
    });

    //logout
    Route::get('/jobseeker/logout', 'JobseekersController@logout')->name('jobseeker.logout');

});



Route::resource('/employer/jobvacancy/apllicant', 'JobVacancyController')->middleware('auth');
Route::resource('/employer/jobvacancy/candidate', 'CandidateController')->middleware('auth');
Route::resource('/employer/jobvacancy/onlineinterview', 'OnlineInterviewController')->middleware('auth');
Route::resource('/employer/jobvacancy/onlinetesting', 'OnlineTestingController')->middleware('auth');

Route::get('/employer/signup', 'EmployerAuthController@getRegister')->middleware('guest');
Route::post('/employer/signup', 'EmployerAuthController@postRegister')->name('register')->middleware('guest');
Route::post('/email', 'EmployerAuthController@send')->name('email/send');

Route::get('/employer/signin', 'EmployerAuthController@getLogin')->name('login')->middleware('guest');
Route::post('/postlogin', 'EmployerAuthController@postlogin')->middleware('guest');
Route::get('/logout', 'EmployerAuthController@logout');

Route::get('/employer/talentsearch', 'TalentSearchController@index')->middleware('auth');
Route::get('/employer/talentsearch/profile', 'ProfileController@index')->middleware('auth');
Route::get('/employer/talentsearch/{pelamar}/kirim_pdf', 'TalentSearchController@kirim_pdf');
Route::get('/employer/talentsearch/{pelamar}/offer', 'TalentSearchController@offer');
Route::get('/employer/talentsearch/cari', 'TalentSearchController@cari');
Route::get('/employer/talentsearch/{pelamar}/profile', 'ProfileController@index');
Route::get('/employer/talentsearch/profile/{pelamar}/project', 'ProfileController@project')->middleware('auth');
Route::get('/employer/talentsearch/profile/{pelamar}/backgroundeducation', 'ProfileController@background')->middleware('auth');
Route::get('/employer/talentsearch/profile/{pelamar}/professionalskills', 'ProfileController@pro')->middleware('auth');
Route::get('/employer/talentsearch/profile/{pelamar}/basicassessment', 'ProfileController@basic')->middleware('auth');
Route::get('/employer/talentsearch/profile/{pelamar}/advancedassessment', 'ProfileController@advan')->middleware('auth');
Route::get('/pilihan', 'ProfileController@home')->middleware('guest');