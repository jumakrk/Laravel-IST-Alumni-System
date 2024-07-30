<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Route::group(['middleware' => ['role:super-admin|admin']], function() {

    Route::resource('permissions', App\Http\Controllers\PermissionController::class)->names(['index' => 'permissions']);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class)->names(['index' => 'roles']);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy'])
        ->middleware('permission:delete role');

    Route::get('roles/{roleId}/give-permission', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permission', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class)->names(['index' => 'users']);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
// });

// Route::resource('jobs', JobsController::class)->names(['index' => 'jobs']);

Route::resource('jobs', App\Http\Controllers\JobsController::class)->names([
    'index' => 'jobs.index',
    'create' => 'jobs.create',
    'store' => 'jobs.store',
    'show' => 'jobs.show',
    'edit' => 'jobs.edit',
    'update' => 'jobs.update',
    'destroy' => 'jobs.destroy',
]);

// Show the job application form
Route::get('jobs/{job}/apply', [App\Http\Controllers\JobApplicationController::class, 'create'])->name('jobs.apply');

// Handle the application submission
Route::post('jobs/{job}/apply', [App\Http\Controllers\JobApplicationController::class, 'store'])->name('applications.store');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
