<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;

// Routes for managing permissions and roles (accessible only by super admins)
Route::middleware('role:super-admin')->group(function () {
    Route::resource('permissions', App\Http\Controllers\PermissionController::class)->names(['index' => 'permissions']);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class)->names(['index' => 'roles']);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy'])
        ->middleware('permission:delete role');

    Route::get('roles/{roleId}/give-permission', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permission', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);
});

// Routes for managing users (accessible only by admins)
Route::middleware('role:super-admin|admin')->group(function () {
    Route::resource('users', App\Http\Controllers\UserController::class)->names(['index' => 'users']);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
});

// Job routes accessible by all authenticated users
Route::middleware('auth')->group(function () {
    // Routes for viewing and applying for jobs (accessible by all authenticated users)
    Route::get('/jobs', [App\Http\Controllers\JobsController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [App\Http\Controllers\JobsController::class, 'show'])->name('jobs.show');
    Route::get('jobs/{job}/apply', [App\Http\Controllers\JobApplicationController::class, 'create'])->name('jobs.apply');
    Route::post('jobs/{job}/apply', [App\Http\Controllers\JobApplicationController::class, 'store'])->name('applications.store');

    // Routes for creating, editing, updating, and deleting jobs (accessible only by admins)
    Route::middleware('role:super-admin|admin')->group(function () {
        Route::get('/jobs/create', [App\Http\Controllers\JobsController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [App\Http\Controllers\JobsController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [App\Http\Controllers\JobsController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{job}', [App\Http\Controllers\JobsController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{job}', [App\Http\Controllers\JobsController::class, 'destroy'])->name('jobs.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Test email route (to be removed)
Route::get('/test-mail', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('your-email@gmail.com')  // Replace with your email address
                ->subject('Test Email');
    });

    return 'Mail sent successfully!';
});

// Include auth routes
require __DIR__.'/auth.php';
