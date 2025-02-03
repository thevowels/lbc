<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return response($request->user());
    }

    public function show(User $user)
    {
        $route = Route::currentRouteName();
        return Inertia::render('User/Profile', ['user'=>$user, 'chirps'=>$user->chirps, 'route'=>$route]);
    }
    public function all(Request $request)
    {
        return Inertia::render('User/AllUsers',['users'=> User::all()]);
    }
}