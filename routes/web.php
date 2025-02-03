<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use App\Enums\Category;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/categories/{category}', function(Category $category) {
    return $category->value;
}); 

Route::get('blahblah/{atoz}', function(User $atoz){
    return Inertia::render('User/Profile', ['user'=> $atoz, 'chirps'=>$atoz->chirps]);
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/users', [UserController::class, 'all'])->name('user.all');

Route::get('/user/{user}', [UserController::class, 'show'])
            ->name('user.single')
            ->missing(function (Request $request){
                return Redirect::route('user.all');
            });

Route::get('/user/email/{user:email}', [UserController::class, 'show'])->name('user.emailSingle');

Route::get('/user', [UserController::class, 'index'])->name('user.current');

Route::view('/welcome', 'welcome', ['name' => 'Taylor'])->middleware('myMiddlewareGroup');

Route::redirect('/hello','/greet',301);

Route::get('/greet', function(){
    return('Hello World');
})->middleware(['auth','verified',"token:asdf,xyzk"])->name('greet');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
