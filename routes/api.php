<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return 'This is User API';
});

Route::post('/user', function(Request $request) {
    return $request->all();
});
