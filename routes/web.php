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
Route::get('/mail', function() {
    $user = App\User::first();

    return new App\Mail\UserRegistered($user);
});
//Route::feeds();

Route::get('/', 'PostController@index');
Route::get('/post/{slug}', 'PostController@show')->name('posts.single');
Route::get('/tag/{slug}', 'TagController@index')->name('posts.tags');

Route::get('/about-me', function () {
    return view('pages.about');
})->name('about');


Route::get('/account/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/account/register', 'Auth\RegisterController@register');
Route::get('/account/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/account/login', 'Auth\LoginController@login');
Route::post('/account/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/admin/post/create', 'Admin\PostController@create')->name('admin.post.create');
Route::post('/admin/post/create', 'Admin\PostController@store');
Route::get('/admin/post/{id}', 'Admin\PostController@edit')->name('admin.post.edit');
Route::put('/admin/post/{id}', 'Admin\PostController@update');
Route::delete('/admin/post/{id}', 'Admin\PostController@destroy')->name('admin.post.delete');

Route::post('comment/create', 'CommentController@store')->name('comment.create');

Route::get('/contact', 'ContactController@show')->name('contact');
Route::post('/contact', 'ContactController@send');

Route::get('/search', 'SearchController@index')->name('search');
