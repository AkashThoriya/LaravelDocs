<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;
use Illuminate\Http\Request;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('post', Posts::class);

Route::get('contacts', function () {
    return view('default-dynamic-form');
});

Route::get('dynamic-form-jquery', function () {
    return view('dynamic-generation-jquery');
});

Route::get('image-upload', function () {
    return view('default-file');
});

Route::get('/testElasticSearch',function (){
    dd(\App\Helpers\ElasticSearch::advanceSearch());
});

Route::get('/testPaginator',function (){
    dd(\App\Helpers\CustomPaginator::getPaginator(4));
});
