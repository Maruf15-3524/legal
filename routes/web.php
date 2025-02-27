<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamMemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

// Route::get('/add-team-member', function () {
//     return view('team_member_info');
// });

Route::get('index/add-team-member', function() {
    // Return a partial view (only the content for this section)
    return view('partials.team_member_info');
})->name('add-team-member');

Route::get('/add-research', function() {
    return view('partials.add-research');
})->name('add-research');

Route::get('/add-vlog', function() {
    return view('partials.add-vlog');
})->name('add-vlog');

Route::get('/add-photo', function() {
    return view('partials.add-photo');
})->name('add-photo');



Route::post('/team-members/store', [TeamMemberController::class, 'store'])->name('team-members.store');

Route::get('/team-members/list', [TeamMemberController::class, 'view_data'])->name('team-members.list');
