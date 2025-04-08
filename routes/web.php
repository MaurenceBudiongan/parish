<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminInfoController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\Onclick;


Route::get('/', function () {
    return view('/user/document_requests/create'); // Always display welcome page first
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


// Admin routes without authentication
Route::get('/admin/document-requests', [DocumentRequestController::class, 'index'])->name('admin.document_requests.index');
Route::get('/admin/document-requests/{documentRequest}/edit', [DocumentRequestController::class, 'edit'])->name('admin.document_requests.edit');
Route::put('/admin/document-requests/{documentRequest}', [DocumentRequestController::class, 'update'])->name('admin.document_requests.update');
Route::delete('/admin/document-requests/{documentRequest}', [DocumentRequestController::class, 'destroy'])->name('admin.document_requests.destroy');
Route::put('/admin/document-requests/{documentRequest}/approve', [DocumentRequestController::class, 'approve'])->name('admin.document_requests.approve');
Route::put('/admin/document-requests/{documentRequest}/reject', [DocumentRequestController::class, 'reject'])->name('admin.document_requests.reject');


// User routes without authentication
Route::get('/user/document-requests', [DocumentRequestController::class, 'userIndex'])->name('user.document_requests.index');
Route::get('/user/document-requests/create', [DocumentRequestController::class, 'create'])->name('user.document_requests.create');
Route::post('/user/document-requests', [DocumentRequestController::class, 'store'])->name('user.document_requests.store');

