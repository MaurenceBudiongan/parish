<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminInfoController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\Onclick;


Route::get('/', function () {
    return view('welcome'); // Always display welcome page first
});
Route::get('/parishioner/documentRequest', function () {
    return view('/parishioner/documentRequest'); 
});
Route::get('/admin/user', [SidebarController::class, 'showUser']);
Route::get('/admin/documentrequest', [SidebarController::class, 'showDocumentRequest']);




Route::get('/admin/create', [AdminInfoController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminInfoController::class, 'store'])->name('admin.store');
Route::get('/authentication/adminform', [Onclick::class, 'adminform'])->name('authentication.adminform');


// Prevent access to dashboard until form is submitted
Route::get('/admin/dashboar', function () {
    if (!session('form_submitted')) { // Check if form was submitted
        return redirect()->route('admin.create'); // Redirect to create form
    }
    return view('admin.dashboar'); // Allow dashboard access only after submission
})->name('admin.dashboar');