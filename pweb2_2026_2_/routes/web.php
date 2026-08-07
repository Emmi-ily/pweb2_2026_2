<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('main');
});

Route::get('/Aluno', [AlunoController::class, 'index']);
Route::get('/Aluno/create', [AlunoController::class, 'create']);

/*
Route::get('/aluno', function () {
    return view('aluno.list');
    //return "<h3>aaaaaaa</h3>";
});
*/