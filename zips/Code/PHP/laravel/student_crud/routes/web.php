<?php

//controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TierController;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

//models
use App\Models\Siswa;
use App\Models\Posting;
use App\Models\Users;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name"  => "Najwa Nisrina",
        "email" => "najnia.sc@gmail.com",
        "img"   => "sherly.png"
    ]);
});

//postdex = method
    Route::get('/post', [PostController::class, 'postdex']);
// single-post
    Route::get('post/{posts:slug}', [PostController::class, 'show']);

//----------------
    Route::group(['middleware' => ['auth', 'tier:admin']], function(){
//Siswa1
    //Prof
        Route::get('/profile', [ProfileController::class, 'prodex'])->name('profile');
            
        //Profile
            Route::get('/profile/create', [ProfileController::class, 'proshow'])->name('profile.create')->middleware('auth');
            Route::post('/profile/insert', [ProfileController::class, 'proin'])->name('profile.insert');
        //Edit
            Route::get('/profile/show/{id}', [ProfileController::class, 'proid'])->name('profile.show')->middleware('auth');
            Route::post('/profile/update/{id}', [ProfileController::class, 'proids'])->name('profile.update');
        //Delete
            Route::get('/profile/delete/{id}', [ProfileController::class, 'proidd'])->name('profile.delete')->middleware('auth');

    //Users        
        Route::get('/users', [ProfileController::class, 'prous'])->name('users');

        //Profil
        //Profile
            Route::get('/users/create', [ProfileController::class, 'ushow'])->name('users.create');
            Route::post('/users/insert', [ProfileController::class, 'uin'])->name('users.insert');
        //Edit
            Route::get('/users/shows/{id}', [ProfileController::class, 'uid'])->name('users.show');
            Route::post('/users/update/{id}', [ProfileController::class, 'uids'])->name('users.update');
        //Delete
            Route::get('/users/delete/{id}', [ProfileController::class, 'uidd'])->name('users.delete');
    });

// ----------------
    Route::group(['middleware' => ['auth', 'tier:user']], function(){
//Siswa2
        Route::get('/profil', [ProfileController::class, 'prode'])->name('profil');
    });

//Login
    Route::get('/login', [LoginController::class, 'log'])->name('login');
    Route::post('/prolog', [LoginController::class, 'lor'])->name('prolog');
//Register
    Route::get('/register', [LoginController::class, 'reg'])->name('register');
    Route::post('/new', [LoginController::class, 'ger'])->name('new');
//Tier
    Route::get('/admin', [TierController::class, 'admin'])->name('admin')->middleware('auth');
    Route::get('/mod', [TierController::class, 'mod'])->name('mod')->middleware('auth');
    Route::get('/user', [TierController::class, 'user'])->name('user')->middleware('auth');
//Logout
    Route::get('/logout', [LoginController::class, 'out'])->name('logout')->middleware('auth');

/*Route::get('/', function () {
    return view('welcome');
}); */

/* ---


Route::get('/siswa', function(){
    return view('profile', [
        "title" => "Siswa",
        "post"  => Siswa::all()
    ]);
}); */

// Route::get('/Najwa', [ProfileController::class, 'index']);

/*Route::get('/Najwa', function () {
    return view('profile');
});*/
