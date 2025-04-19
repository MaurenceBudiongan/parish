<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\Onclick;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BaptismalRecordController;
use App\Http\Controllers\ConfirmationRecordController;
use App\Http\Controllers\ParishionerController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('/authentication/adminform'); 
});
Route::get('/admin/dashboard/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->middleware('auth:admin')->name('admin.dashboard.dashboard');

Route::get('/user_main', function () {
    return view('user/document_requests/main'); 
});

Route::get('/admin/parishionerCreate', function () {
    return view('/admin/create_record/parishionerCreate'); 
});

//parishioner
Route::resource('parishioners', ParishionerController::class);

// Onclicks
Route::get('/request_form', [Onclick::class, 'create'])->name('documentrequest.create');
Route::get('/adminform', [Onclick::class, 'adminform'])->name('adminform.adminform');

// Baptismal Record Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/baptismal-records', [BaptismalRecordController::class, 'index'])->name('baptismal.index');
});

// List all baptismal records
Route::get('/admin/baptismal-records', [BaptismalRecordController::class, 'index'])->name('admin.baptismal.index');

// Show the create form
Route::get('/admin/baptismal-records/create', [BaptismalRecordController::class, 'create'])->name('baptismal.create');

// Store the new baptismal record
Route::post('/admin/baptismal-records', [BaptismalRecordController::class, 'store'])->name('admin.baptismal.store');

// Show the edit form
Route::get('/admin/baptismal-records/{id}/edit', [BaptismalRecordController::class, 'edit'])->name('admin.baptismal.edit');

// Update the baptismal record
Route::put('/admin/baptismal-records/{id}', [BaptismalRecordController::class, 'update'])->name('admin.baptismal.update');

// Delete the baptismal record
Route::delete('/admin/baptismal-records/{id}', [BaptismalRecordController::class, 'destroy'])->name('admin.baptismal.destroy');

//Confirmation Records Routes
Route::resource('confirmation', ConfirmationRecordController::class);
Route::get('/admin/confirmation/create', [ConfirmationRecordController::class, 'create'])->name('confirmation.create');
Route::get('/admin/confirmation', [ConfirmationRecordController::class, 'index'])->name('confirmation.index');
Route::delete('/confirmation/{confirmation}', [ConfirmationRecordController::class, 'destroy'])->name('confirmation.destroy');





Route::get('/admin/user', [SidebarController::class, 'showUser']);
Route::get('/admin/document_requests', [SidebarController::class, 'showDocumentRequest']);

Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);


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

Route::get('admin/dashboard', function () {
 
    if (!Auth::check() || !Auth::user()->is_valid) {
        // If kuan fail, mo redirect sa name(adminform.adminform(authentication.adminform))
        return redirect()->route('adminform.adminform');
    }
    // If ok continue to dashboard
    return view('admin.dashboard.dashboard');
});

// Admin routes without authentication
Route::get('/admin/document_requests', [DocumentRequestController::class, 'index'])->name('admin.document_requests.index');
Route::get('/admin/document_requests/{documentRequest}/edit', [DocumentRequestController::class, 'edit'])->name('admin.document_requests.edit');
Route::put('/admin/document_requests/{documentRequest}', [DocumentRequestController::class, 'update'])->name('admin.document_requests.update');
Route::delete('/admin/document_requests/{documentRequest}', [DocumentRequestController::class, 'destroy'])->name('admin.document_requests.destroy');
Route::put('admin.document_requests/{id}/approve', [DocumentRequestController::class, 'approve'])->name('admin.document_requests.approve');
Route::put('admin.document_requests/{id}/reject', [DocumentRequestController::class, 'reject'])->name('admin.document_requests.reject');

// User routes without authentication
Route::get('/user/document_requests', [DocumentRequestController::class, 'userIndex'])->name('user.document_requests.index');
Route::post('/user/document_requests', [DocumentRequestController::class, 'store'])->name('user.document_requests.store');

