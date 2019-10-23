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

Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function(){
Route::delete('/stud/{student}/delete', 'StudentController@deleteStudent');

Route::resource('/admin/account', 'UserController');
Route::resource('/member', 'MemberController');
Route::resource('/church', 'ChurchController');
Route::resource('/admin/student', 'StudentController');
Route::resource('/admin/address', 'AddressController');
Route::resource('/admin/education', 'EducationController');



Route::get('/home', function () {
    return view('create_student');
});
});
Route::get('/rel/{id}', 'StudentController@getRelative');
Route::get('/vue/address/{id}', 'StudentController@getAddress');
Route::get('/vue/education/{id}', 'StudentController@getEducation');

//Route::put('/stud', 'StudentController@update');
Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/1', function () {
    return view('auth1.register');
});
Route::get('/admin/profile', function () {
    return view('profile');
});
Route::resource('/admin/addresslist', 'AddressListController');
Route::get('/profile', function () {
    return view('caramoranprofile');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/getstudent', 'StudentController@getStudent');

Route::get('/address', function () {
    return view('create_address');
});
Route::get('/education', function () {
    return view('create_address');
});
Route::resource('/add', 'AddressController');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/registerform', function () {
    return view('registration');
});

//Route::get('/home', 'HomeController@index')->name('home');
