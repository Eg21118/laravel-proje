<?php

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "panel", "as" => "panel."], function () {
    Route::group(['middleware' => 'auth'], function () {

        Route::get("/", [App\Http\Controllers\back\indexController::class, "index"])->name("index");

        Route::group(["prefix" => "country", "as" => "country."], function () {
            Route::get("", [App\Http\Controllers\back\CountryController::class, "index"])->name("index");
            Route::get("/edit/{id}", [App\Http\Controllers\back\CountryController::class, "edit"])->name("edit");
            Route::post("/edit/{id}", [App\Http\Controllers\back\CountryController::class, "editCountry"])->name("editCountry");
            Route::get("/delete/{id}", [App\Http\Controllers\back\CountryController::class, "delete"])->name("delete");
            Route::get("/add", [App\Http\Controllers\back\CountryController::class, "add"])->name("add");
            Route::post("/add", [App\Http\Controllers\back\CountryController::class, "addCountry"])->name("addCountry");
            Route::post("/deleteimage", [App\Http\Controllers\back\CountryController::class, "deleteimage"])->name("deleteimage");
        });

        Route::group(["prefix" => "city", "as" => "city."], function () {
            Route::get("", [App\Http\Controllers\back\CityController::class, "index"])->name("index");
            Route::get("/edit/{id}", [App\Http\Controllers\back\CityController::class, "edit"])->name("edit");
            Route::post("/edit/{id}", [App\Http\Controllers\back\CityController::class, "editCity"])->name("editCity");
            Route::get("/delete/{id}", [App\Http\Controllers\back\CityController::class, "delete"])->name("delete");
            Route::get("/add", [App\Http\Controllers\back\CityController::class, "add"])->name("add");
            Route::post("/ajax", [App\Http\Controllers\back\CityController::class, "ajax"])->name("ajax");
            Route::post("/add", [App\Http\Controllers\back\CityController::class, "addCity"])->name("addCity");
            Route::post("/deleteimage", [App\Http\Controllers\back\CityController::class, "deleteimage"])->name("deleteimage");
        });

        Route::group(["prefix" => "continent", "as" => "continent."], function () {
            Route::get("", [App\Http\Controllers\back\ContinentController::class, "index"])->name("index");
            Route::get("/add", [App\Http\Controllers\back\ContinentController::class, "add"])->name("add");
            Route::get("/edit/{id}", [App\Http\Controllers\back\ContinentController::class, "edit"])->name("edit");
            Route::get("/delete/{id}", [App\Http\Controllers\back\ContinentController::class, "delete"])->name("delete");
            Route::post("/add",[App\Http\Controllers\back\ContinentController::class,"addContinent"])->name("addContinent");
            Route::post("/edit/{id}",[App\Http\Controllers\back\ContinentController::class,"editContinent"])->name("editContinent");
            Route::post("/deleteimage", [App\Http\Controllers\back\ContinentController::class, "deleteimage"])->name("deleteimage");
        });

    });
    Route::get("/profile", [App\Http\Controllers\back\indexController::class, "profile"])->name("profile");
    Route::post("/profile", [App\Http\Controllers\back\indexController::class, "profile_post"])->name("profile_post");
    Route::get("/login", [App\Http\Controllers\back\loginController::class, "index"])->name("login");
    Route::get("/logout", [App\Http\Controllers\back\loginController::class, "logout"])->name("logout");
    Route::post("/login", [App\Http\Controllers\back\loginController::class, "login_post"])->name("login_post");
    Route::get("/register", [App\Http\Controllers\back\registerController::class, "index"])->name("register");
    Route::post("/register", [App\Http\Controllers\back\registerController::class, "register_post"])->name("register_post");
});

Route::get("/",[App\Http\Controllers\front\indexController::class,"index"])->name("index");

Route::group(["prefix" => "cities", "as" => "cities."],function () {
    Route::get("/{search?}",[App\Http\Controllers\front\CityController::class,"index"])->name("index");
    Route::get("/detail/{id}",[App\Http\Controllers\front\CityController::class,"detail"])->name("detail");
});

Route::group(["prefix" => "countries", "as" => "countries."],function () {
    Route::get("/{search?}",[App\Http\Controllers\front\CountryController::class,"index"])->name("index");
    Route::get("/detail/{id}",[App\Http\Controllers\front\CountryController::class,"detail"])->name("detail");
});

Route::group(["prefix" => "continents", "as" => "continents."],function () {
    Route::get("/{search?}",[App\Http\Controllers\front\ContinentsController::class,"index"])->name("index");
    Route::get("/detail/{id}",[App\Http\Controllers\front\ContinentsController::class,"detail"])->name("detail");
});
