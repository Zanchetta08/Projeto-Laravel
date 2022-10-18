<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MovieController;

Route::get('/', [AlunoController::class,'index']);
Route::get('/alunos/inserir', [AlunoController::class,'inserir']);
Route::get('/alunos/{id}', [AlunoController::class, 'show']);
Route::post('/alunos', [AlunoController::class, 'store']);
Route::delete('/alunos/{id}', [AlunoController::class, 'destroy']);
Route::get('/alunos/edit/{id}', [AlunoController::class, 'edit']);
Route::put('/alunos/update/{id}', [AlunoController::class, 'update']);


Route::get('/professores', [ProfessorController::class, 'professor']);
Route::get('/professores/inserir', [ProfessorController::class, 'inserir']);
Route::get('/professores/{id}', [ProfessorController::class, 'show']);
Route::post('/professores', [ProfessorController::class, 'store']);
Route::delete('/professores/{id}', [ProfessorController::class, 'destroy']);
Route::get('/professores/edit/{id}', [ProfessorController::class, 'edit']);
Route::put('/professores/update/{id}', [ProfessorController::class, 'update']);

Route::get('/materias', [MateriaController::class,'materia']);
Route::get('/materias/inserir', [MateriaController::class, 'inserir']);
Route::get('/materias/{id}', [MateriaController::class, 'show']);
Route::post('/materias', [MateriaController::class, 'store']);
Route::delete('/materias/{id}', [MateriaController::class, 'destroy']);
Route::get('/materias/edit/{id}', [MateriaController::class, 'edit']);
Route::put('/materias/update/{id}', [MateriaController::class, 'update']);









