<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get("", "WelcomeController");

Route::post("alumni", "AlumniController@store")->name("alumni.register");

Route::get("home", 'HomeController@index')->name('home');

Route::prefix("admin")->group(function () {
    Route::get("", "SessionController@showLoginForm");
    Route::get("login", "SessionController@showLoginForm");
    Route::post("login", "SessionController@login")->name("admin.login");

    Route::get("alumni", "Administrator\AlumniController@index")->name("alumni.index");
    Route::get("alumni/{alumnus}", "Administrator\AlumniController@index")->name("alumni.show");

    Route::get("courses", "Administrator\CoursesController@index")->name("courses.index");
    Route::get("courses/{course}", "Administrator\CoursesController@show")->name("courses.show");
    Route::get("courses/{course}/edit", "Administrator\CoursesController@show")->name("courses.show");
});
