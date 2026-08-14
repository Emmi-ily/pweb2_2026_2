<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('main');
});

Route::get('/aluno', [AlunoController::class, 'index']);
Route::get('/aluno/create', [AlunoController::class, 'create']);
Route::post('/aluno/store', [AlunoController::class, 'store'])->name('aluno.store'); //post pra não aparecer na url
Route::post('/aluno/search', [AlunoController::class, 'search'])->name('aluno.search');
Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/{id}', [AlunoController::class, 'update'])->name('aluno.update');
Route::put('/aluno/delete/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');

/*
Route::get('/aluno', function () {
    return view('aluno.list');
    //return "<h3>Olá mundo Laravel!</h3>";
});
*/