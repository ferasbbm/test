<?php

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

Route::get('/', function (\Illuminate\Http\Request $request) {
    $credentials= $request->only(['mobile', 'password']);
    return $request;
    if (!auth()->attempt($credentials))
        return $this->ApiErrorResponse(null, trans('api.credentials_error'));

    return $this->createToken('access_token')->accessToken;
});
