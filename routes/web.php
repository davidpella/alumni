<?php

Auth::routes();
Route::view("", "pages.home")->name("pages.home");
Route::view("about-us", "pages.about")->name("pages.about");
Route::get("register", "WelcomeController");
Route::post("alumni", "AlumniController@store")->name("alumni.register");
Route::get("home", 'HomeController@index')->name('home');

Route::prefix("admin")->group(function () {
    Route::get("", "SessionController@showLoginForm");
    Route::get("login", "SessionController@showLoginForm");
    Route::post("login", "SessionController@login")->name("admin.login");

    Route::get("alumni", "Administrator\AlumniController@index")->name("alumni.index");
    Route::get("alumni/{alumnus}", "Administrator\AlumniController@show")->name("alumni.show");

    Route::get("users", "Administrator\UsersController@index")->name("users.index");
    Route::get("users/create", "Administrator\UsersController@create")->name("users.create");
    Route::post("users", "Administrator\UsersController@store")->name("users.store");
    Route::put("users/{user}", "Administrator\UsersController@update")->name("users.update");
    Route::delete("users/{user}", "Administrator\UsersController@destroy")->name("users.destroy");

    Route::get("courses", "Administrator\CoursesController@index")->name("courses.index");
    Route::get("courses/{course}", "Administrator\CoursesController@show")->name("courses.show");
    Route::put("courses/{course}", "Administrator\CoursesController@update")->name("courses.update");
    Route::delete("courses/{course}", "Administrator\CoursesController@destroy")->name("courses.destroy");
    Route::post("courses", "Administrator\CoursesController@store")->name("courses.store");
    Route::get("courses/{course}/edit", "Administrator\CoursesController@show")->name("courses.show");
});
