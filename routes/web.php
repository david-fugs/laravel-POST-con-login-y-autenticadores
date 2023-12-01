<?php

use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;


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
// $posts= [
//     ['title'=>'First post'],
//     ['title'=>'Second post'],
//     ['title'=>'Third post'],
//     ['title'=>'Fourth post'],
// ];



Route::view('/', 'welcome')->name('welcome');
Route::view('/contact', 'contact')->name('contact');
//  Route::get('/blog', 'blog',['posts'=>$posts])->name('blog'); //se puede mandar datos asi, o tambien con GET y funciones 



// Route::get('/blog',[PostController::class,'index']
// )->name('posts.index');
// Route::get('/blog/create',[PostController::class,'create'])->name('posts.create');//importa el orden de las routes, daba un error por que si se ejecuta primero el que tiene blog{post} no entra al create
// Route::post('/blog',[PostController::class,'store'])->name('posts.store');


// Route::get('/blog/{post}',[PostController::class,'show'])->name('posts.show');//con las llaves simples agarra el id como parametro y se lo manda al controlador
// Route::get('/blog/{post}/edit',[PostController::class,'edit'])->name('posts.edit'); 
// Route::patch('/blog/{post}',[PostController::class,'update'])->name('posts.update');

// Route::view('/about', 'about')->name('about');
// // Route::resource('blog',PostController::class,[
// //     'names'=>'posts',
// //     'parameteres'=>['blog'=>'post']
// // ]);
// Route::delete('/blog/{post}',[PostController::class,'destroy'])->name('posts.destroy');


Route::resource('posts', PostController::class)->names('posts'); //asi ponemos todas las categorias del controlador

Route::view('/about','about')->name('about');
Route::view('/login','auth.login')->name('login');
Route::post('/login',[AuthenticatedSessionController::class,'store']);
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');


Route::view('/register','auth.register')->name('register');

Route::post('/register',[RegisteredUserController::class,'store']);

