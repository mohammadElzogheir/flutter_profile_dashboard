<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect('/departments');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('departments', \App\Http\Controllers\DepartmentController::class);
    Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
    Route::get('attendance', [\App\Http\Controllers\AttendanceController::class,'index'])->name('attendance.index');
Route::post('attendance', [\App\Http\Controllers\AttendanceController::class,'store'])->name('attendance.store');
Route::get('employees/{employee}/attendance', [\App\Http\Controllers\AttendanceController::class,'show'])->name('attendance.employee');
Route::get('attendance/report', [\App\Http\Controllers\AttendanceController::class,'report'])->name('attendance.report');

});

require __DIR__.'/auth.php';
