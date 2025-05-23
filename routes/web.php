<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\Onclick;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BaptismalController;
use App\Http\Controllers\BaptismalRecordController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\ConfirmationRecordController;
use App\Http\Controllers\ParishionerController;
use App\Http\Controllers\MarriageRecordController;
use App\Http\Controllers\DeathCertificateController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\MassScheduleController;
use App\Http\Controllers\EventAnnouncementController;
use App\Http\Controllers\PriestController;
use App\Http\Controllers\PriestAssignmentController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BaptismRequestController;
use App\Http\Controllers\ConfirmationRequestController;
use App\Http\Controllers\MarriageRequestController;
use App\Http\Controllers\DeathRequestController;
use App\Http\Controllers\RequestSearchController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminLoginController;
use App\Models\EventAnnouncement;

Route::get('/', function () {
    return view('landingpage.landingpage'); 
});
Route::get('/parishionerReport', function () {
    return view('parishioner.report'); 
});

Route::get('/Send', function () {
    return view('sendCertificate.sendRequest'); 
});
Route::get('/baptismalstry', function () {
    return view('admin.baptismal.create'); 
});



Route::get('/user_main', function () {
    return view('user/document_requests/main'); 
});
Route::get('/admin/parishionerCreate', function () {
    return view('/admin/create_record/parishionerCreate'); 
});
Route::get('/admin/donation', function () {
    return view('/admin/record/financialRecord/donationRecord'); 
});
Route::get('/landingpage', function () {
    return view('/landingpage/landingpage'); 
});
// BAPTISM REQUESTS
Route::resource('baptismrequest', BaptismRequestController::class);
Route::put('baptismrequest/{id}/approve', [BaptismRequestController::class, 'approve'])->name('baptismrequest.approve');
Route::put('baptismrequest/{id}/reject', [BaptismRequestController::class, 'reject'])->name('baptismrequest.reject');
Route::get('baptismrequest/index', [BaptismRequestController::class, 'UserIndex'])->name('baptismrequest.userIndex');

// CONFIRMATION REQUESTS
Route::resource('confirmationrequest', ConfirmationRequestController::class);
Route::put('confirmationrequest/{id}/approve', [ConfirmationRequestController::class, 'approve'])->name('confirmationrequest.approve');
Route::put('confirmationrequest/{id}/reject', [ConfirmationRequestController::class, 'reject'])->name('confirmationrequest.reject');

// MARRIAGE REQUESTS
Route::resource('marriagerequest', MarriageRequestController::class);
Route::put('marriagerequest/{id}/approve', [MarriageRequestController::class, 'approve'])->name('marriagerequest.approve');
Route::put('marriagerequest/{id}/reject', [MarriageRequestController::class, 'reject'])->name('marriagerequest.reject');

// DEATH REQUESTS
Route::resource('deathrequest', DeathRequestController::class);
Route::put('deathnmrequest/{id}/approve', [DeathRequestController::class, 'approve'])->name('deathrequest.approve');
Route::put('deathnmrequest/{id}/reject', [DeathRequestController::class, 'reject'])->name('deathrequest.reject');

// CERTIFICATES
Route::resource('baptismals',BaptismalController::class);
Route::resource('confirmations',ConfirmationController::class);
Route::resource('marriages',MarriageController::class);
Route::resource('deaths',DeathController::class);

//DOWNLOADS
Route::get('/baptismals/{id}/download', [BaptismalController::class, 'download'])->name('baptismals.download');
Route::get('/confirmations/{id}/download', [ConfirmationController::class, 'download'])->name('confirmations.download');
Route::get('/marriages/download/{id}', [MarriageController::class, 'download'])->name('marriages.download');
Route::get('/deaths/download/{id}', [DeathController::class, 'download'])->name('deaths.download');



//SEND REQUEST
Route::get('/search-requests', [RequestSearchController::class, 'search'])->name('requests.search');
Route::get('/get-document/{type}/{id}', [DocumentController::class, 'showDocument'])->name('document.get');
Route::get('/showsendRequest', [RequestSearchController::class, 'sendRequest'])->name('sendRequest.sendRequest');


Route::post('/baptismals/send-request/{id}', [BaptismalController::class, 'sendRequest'])->name('baptismals.sendRequest');




// Onclicks
Route::get('/request_form', [Onclick::class, 'create'])->name('documentrequest.create');
Route::get('/adminform', [Onclick::class, 'adminform'])->name('authentication.adminform');
Route::get('/staffclick', [Onclick::class, 'staff'])->name('staffclick');
Route::get('/parishionerclick', [Onclick::class, 'parishioner'])->name('gets_started');
Route::get('/showdashboard', [Onclick::class, 'dashboard'])->name('showdashboard');
//parishioner
Route::resource('parishioners', ParishionerController::class);
Route::get('/parishioner/report', [ParishionerController::class, 'report'])->name('parishioners.report');
//death
Route::get('/death', function () {
    return view('/admin/create_record/deathCreate'); 
});
//Marriage Records
Route::resource('marriage', MarriageRecordController::class)->parameters([
    'marriage' => 'marriageRecord'
]);
//Death Records
Route::resource('death', DeathCertificateController::class)->parameters([
    'death' => 'deathCertificate'
]);
//donation
Route::resource('donation',DonationController::class);
Route::get('/donations/report', [DonationController::class, 'report'])->name('donations.report');

//mass_schedules
Route::resource('mass_schedules', MassScheduleController::class);
Route::get('/user/mass', [MassScheduleController::class, 'UserIndex'])->name('mass.UserIndex');
 
// event announcement
Route::resource('event_announcements', EventAnnouncementController::class);
Route::get('/showEvent', [EventAnnouncementController::class, 'showevent'])->name('showEvent.showEvent');
//priest
Route::resource('priests', PriestController::class);
Route::get('/priests-login', [PriestController::class, 'showLoginForm'])->name('priests.login.form');
Route::post('/priests-login', [PriestController::class, 'login'])->name('priests.login.submit');
Route::post('/priests-logout', [PriestController::class, 'logout'])->name('priests.logout');
//priest Assignment
Route::resource('priests_assignments', PriestAssignmentController::class);
//staff
Route::resource('staff', StaffController::class);
Route::get('/staff-login', [StaffController::class, 'loginForm'])->name('staff.login');
Route::post('/staff-login', [StaffController::class, 'login'])->name('staff.login.submit');




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



//Admin Authentication
Route::get('/admin/user', [SidebarController::class, 'showUser']);
Route::get('/admin/document_requests', [SidebarController::class, 'showDocumentRequest']);
Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth:admin')->name('admin.logout');
Route::get('/admin/showdashboard', [AdminAuthController::class, 'showdashboard'])->name('admin.showdashboard');

Route::get('/adminaccess/login', [AdminLoginController::class, 'showLoginForm'])->name('adminaccess.login');
Route::post('/admin/logins', [AdminLoginController::class, 'logins'])->name('adminaccess.logins');


//Parishioner Authentication
use App\Http\Controllers\ParishionerAuthController;

Route::get('/register', [ParishionerAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [ParishionerAuthController::class, 'register'])->name('user.register.process');
Route::get('/login', [ParishionerAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [ParishionerAuthController::class, 'login'])->name('user.login.process');
Route::get('/dashboard', function () {
    return view('user.document_requests.main');
})->middleware('auth:parishioner')->name('user.document_requests.main');


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

//Admin Document Request
Route::get('/admin/document_requests', [DocumentRequestController::class, 'index'])->name('admin.document_requests.index');
Route::get('/admin/document_requests/{documentRequest}/edit', [DocumentRequestController::class, 'edit'])->name('admin.document_requests.edit');
Route::put('/admin/document_requests/{documentRequest}', [DocumentRequestController::class, 'update'])->name('admin.document_requests.update');
Route::delete('/admin/document_requests/{documentRequest}', [DocumentRequestController::class, 'destroy'])->name('admin.document_requests.destroy');
Route::put('admin.document_requests/{id}/approve', [DocumentRequestController::class, 'approve'])->name('admin.document_requests.approve');
Route::put('admin.document_requests/{id}/reject', [DocumentRequestController::class, 'reject'])->name('admin.document_requests.reject');
// User Document Request
Route::get('/user/document_requests/index', [DocumentRequestController::class, 'userIndex'])->name('user.document_requests.index');
Route::post('/user/document_requests', [DocumentRequestController::class, 'store'])->name('user.document_requests.store');
// gcash
 use App\Http\Controllers\GCashController;
Route::get('/pay/gcash', function () {
    return view('gcash.form');
});
Route::post('/pay/gcash', [GCashController::class, 'initiatePayment'])->name('gcash.pay');
Route::get('/pay/gcash/success', [GCashController::class, 'success'])->name('gcash.success');
Route::get('/pay/gcash/failed', [GCashController::class, 'failed'])->name('gcash.failed');

// counts
Route::get('/document-counts', function () {
    return response()->json([
        'baptismal' => \App\Models\BaptismRequest::count(),
        'confirmation' => \App\Models\ConfirmationRequest::count(),
        'marriage' => \App\Models\MarriageRequest::count(),
    ]);
});
