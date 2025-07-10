<?php

use App\http\Controllers\Admin\FamilyController;
use Illuminate\Support\Facades\Route;


route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');



route::resource('families', FamilyController::class);
    