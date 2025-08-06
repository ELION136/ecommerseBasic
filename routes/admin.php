<?php

use App\http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;


route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');



route::resource('families', FamilyController::class);
route::resource('categories', CategoryController::class);
route::resource('subcategories', SubcategoryController::class); // Assuming you want to use the same controller for subcategories
    