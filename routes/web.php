<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VoteController;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'signin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('signin');
Route::delete('/logout', [AuthController::class, 'logout'])->name('signout');

Route::prefix('/admin')->middleware('auth')->group(function () {
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    route::get('/dashboard/chart', [DashboardController::class, 'chart'])->name('dashboard.chart');
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    route::get('/voter', [VoterController::class, 'index'])->name('voter.index');
    route::post('/voter', [VoterController::class, 'store'])->name('voter.store');
    route::post('/voter/import', [VoterController::class, 'import'])->name('voter.import');
    route::delete('/voter/{id}', [VoterController::class, 'destroy'])->name('voter.destroy');
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    route::get('/position', [PositionController::class, 'index'])->name('position.index');
    route::post('/position', [PositionController::class, 'store'])->name('position.store');
    route::delete('/position/{id}', [PositionController::class, 'destroy'])->name('position.destroy');
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
    route::post('/candidate', [CandidateController::class, 'store'])->name('candidate.store');
    route::delete('/candidate/{id}', [CandidateController::class, 'destroy'])->name('candidate.destroy');
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
    route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
    route::delete('/vote/{id}', [VoteController::class, 'destroy'])->name('vote.destroy');
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    route::put('/setting/{id}', [SettingController::class, 'update'])->name('setting.update');
});

Route::prefix('/voter')->middleware('auth:voter')->group(function () {
    route::get('/dashboard', [MainController::class, 'index'])->name('main.voter.index');
    route::post('/vote', [MainController::class, 'vote'])->name('main.voter.vote');
});
