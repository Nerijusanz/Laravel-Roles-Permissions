<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {

    Route::get('profile', [App\Http\Controllers\Api\V1\Auth\ProfileApiController::class, 'show'])->name('profile.show');

    Route::post('profile', [App\Http\Controllers\Api\V1\Auth\ProfileApiController::class, 'update'])->name('profile.update');

    Route::post('password',[App\Http\Controllers\Api\V1\Auth\PasswordUpdateApiController::class,'update'])->name('password.update');

    Route::apiResource('users', App\Http\Controllers\Api\V1\Admin\UsersApiController::class);

    Route::apiResource('permissions', App\Http\Controllers\Api\V1\Admin\PermissionsApiController::class);

    Route::apiResource('roles', App\Http\Controllers\Api\V1\Admin\RolesApiController::class);

    Route::post('auth/logout', App\Http\Controllers\Api\V1\Auth\LogoutApiController::class);

});

Route::post('auth/register', App\Http\Controllers\Api\V1\Auth\RegisterApiController::class);
Route::post('auth/login', App\Http\Controllers\Api\V1\Auth\LoginApiController::class);