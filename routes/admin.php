<?php

use Illuminate\Support\Facades\Route;


route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

route::get('/cursos', function () {
    return 'estos son los cursos';
})->name('admin.cursos');