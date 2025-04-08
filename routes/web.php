<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\Onclick;
use App\Http\Controllers\AdminFormController;


Route::get('/', function () {
    return view('/authentication/adminform'); // Always display welcome page first
});

Route::get('/parishioner/documentRequest', function () {
    return view('/parishioner/documentRequest'); 
});

Route::get('/admin/dashboard/dashboard', function () {
    return view('/admin/dashboard/dashboard'); 
});

Route::get('/authentication/adminform', function () {
    return view('/authentication/adminform'); 
});
Route::get('/admin/user', [SidebarController::class, 'showUser']);
Route::get('/admin/document_requests', [SidebarController::class, 'showDocumentRequest']);

// adminform


use App\Http\Controllers\AdminAuthController;

Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth:admin')->name('admin.dashboard');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth:admin')->name('admin.logout');




// counts
Route::get('/document-counts', function () {
    return response()->json([
        'baptismal' => \App\Models\DocumentRequest::where('documenttype', 'Baptismal')->count(),
        'confirmation' => \App\Models\DocumentRequest::where('documenttype', 'Confirmation')->count(),
        'marriage' => \App\Models\DocumentRequest::where('documenttype', 'Marriagecertificate')->count(),
    ]);
});


// Prevent access to dashboard until form is submitted
Route::get('/admin/dashboar', function () {
    if (!session('form_submitted')) { // Check if form was submitted
        return redirect()->route('admin.create'); // Redirect to create form
    }
    return view('admin.dashboar'); // Allow dashboard access only after submission
})->name('admin.dashboar');

// Admin routes without authentication
Route::get('/admin/document_requests', [DocumentRequestController::class, 'index'])->name('admin.document_requests.index');
Route::get('/admin/document_requests/{documentRequest}/edit', [DocumentRequestController::class, 'edit'])->name('admin.document_requests.edit');
Route::put('/admin/document_requests/{documentRequest}', [DocumentRequestController::class, 'update'])->name('admin.document_requests.update');
Route::delete('/admin/document_requests/{documentRequest}', [DocumentRequestController::class, 'destroy'])->name('admin.document_requests.destroy');

Route::put('admin.document_requests/{id}/approve', [DocumentRequestController::class, 'approve'])->name('admin.document_requests.approve');
Route::put('admin.document_requests/{id}/reject', [DocumentRequestController::class, 'reject'])->name('admin.document_requests.reject');


// User routes without authentication
Route::get('/user/document_requests', [DocumentRequestController::class, 'userIndex'])->name('user.document_requests.index');
Route::get('/user/document_requests/create', [DocumentRequestController::class, 'create'])->name('user.document_requests.create');
Route::post('/user/document_requests', [DocumentRequestController::class, 'store'])->name('user.document_requests.store');

