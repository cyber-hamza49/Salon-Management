<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StylistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\StylistProfileController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\StylistInventoryController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\ContactController;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

// For Role Base Authentication
Route::get('/home',[HomeController::class, 'index']);

// Service Routes (Admin)
Route::get('/Show-services', [ServiceController::class, 'show']);
Route::get('/Addservices', [ServiceController::class, 'create']);
Route::post('/Addservices', [ServiceController::class, 'store']);
Route::get('/edit-service/{id}', [ServiceController::class, 'edit']);
Route::post('/update-service/{id}', [ServiceController::class, 'update']);
Route::delete('/delete-service/{id}', [ServiceController::class, 'destroy']);

// Appointments Routes for Admin
Route::get('/appointments', [AppointmentController::class, 'appointments']);
Route::get('/edit-appointment/{id}', [AppointmentController::class, 'edit']);
Route::post('/update-appointment/{id}', [AppointmentController::class, 'update']);
Route::delete('/delete-appointment/{id}', [AppointmentController::class, 'destroy']);
Route::get('/completed-appointments', [AppointmentController::class, 'completedappointments']);
Route::get('//stylist-commision', [AppointmentController::class, 'stylistCommission']);

// Route For All Users
Route::get('/all-users', [UserController::class, 'allUsers'])->name('users.all');
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/store-users', [UserController::class,'store']);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes For Stylist Profiles (Stylist)
Route::get('/Show-stylists', [StylistController::class, 'show']);
Route::get('/Addstylists', [StylistController::class, 'create']);
Route::post('/Addstylists', [StylistController::class, 'store']);
Route::get('/edit-stylist/{id}', [StylistController::class, 'edit']);
Route::put('/update-stylist/{id}', [StylistController::class, 'update']);
Route::delete('/delete-stylist/{id}', [StylistController::class, 'destroy']);

// Stylist Availability Routes
Route::middleware(['auth'])->group(function () {
Route::get('/stylist/availability/add', [StylistController::class, 'showAvailabilityForm'])->name('stylist.add-availability');
Route::post('/stylist/availability/store', [StylistController::class, 'storeAvailability'])->name('stylist.store-availability');
Route::get('/stylist/availabilities', [StylistController::class, 'showAvailabilities'])->name('stylist.show-availabilities');
Route::delete('/stylist/availability/{id}', [StylistController::class, 'deleteAvailability'])->name('stylist.delete-availability');
});

// Routes For Stylist Profiles (Admin)
Route::get('/Showstylists', [StylistProfileController::class, 'show']);
Route::get('/Add-stylists', [StylistProfileController::class, 'create']);
Route::post('/Add-stylists', [StylistProfileController::class, 'store']);
Route::get('/editstylist/{id}', [StylistProfileController::class, 'edit']);
Route::put('/updatestylist/{id}', [StylistProfileController::class, 'update']);
Route::delete('/deletestylist/{id}', [StylistProfileController::class, 'destroy']);

// RoleWise Users Routes
Route::get('/stylists', [UserController::class, 'stylists']);
Route::get('/recipients', [UserController::class, 'recipients']);
Route::get('/clients', [UserController::class, 'clients']);
Route::get('/admins', [UserController::class, 'admins']);

// Admin Template Pages Routes
Route::get('/Dashboard', [AnalyticsController::class, 'analytics']);
Route::view('/Profile', 'admin_template.profile');

// User Template Pages Routes
Route::get('/userdashboard', [UserController::class, 'index']);
Route::post('/bookings', [UserController::class, 'bookings']);
Route::get('/get-stylist-availability/{stylist_id}', [UserController::class, 'getAvailability']);
Route::delete('/stylist/availability/{id}', [StylistController::class, 'deleteAvailability'])->name('stylist.delete-availability');
Route::get('/contactus', [UserController::class, 'contact']);
Route::get('/barbers', [UserController::class, 'barbers']);
Route::get('/user-appointments', [UserController::class, 'userappointments']);
Route::get('/checkout', [UserController::class, 'checkout']);
Route::get('/edit-appoint/{id}', [UserController::class, 'edit_appoint']);
Route::post('/update-appoint/{id}', [UserController::class, 'update_appoint']);
Route::delete('/delete-appoint/{id}', [UserController::class, 'delete_appoint']);
Route::view('/aboutus', 'user.aboutus');

// Cart Routes
Route::post('/cart/{id}', [CartController::class, 'cart']);
Route::get('/viewcart', [CartController::class, 'viewcart']);
Route::get('/edit-cart/{id}', [CartController::class, 'edit']);
Route::post('/update-cart/{id}', [CartController::class, 'updatecart']);
Route::delete('/delete-cart/{id}', [CartController::class, 'destroy']);

// Stylist Routes
Route::get('/stylistdashboard', [StylistController::class, 'index']);
Route::get('/show_services', [StylistController::class, 'show_services']);
Route::get('/show_appointments', [AppointmentController::class, 'showappointments']);
Route::get('/my-commission', [AppointmentController::class, 'myCommission']);

// Recipient Routes
Route::get('/show_servicesr', [RecipientController::class, 'show_services']);
Route::get('/appointmentsr', [RecipientController::class, 'appointments']);
Route::get('/edit-appointmentr/{id}', [RecipientController::class, 'edit']);
Route::post('/update-appointmentr/{id}', [RecipientController::class, 'update']);
Route::delete('/delete-appointmentr/{id}', [RecipientController::class, 'destroy']);
Route::get('/completed-appointmentsr', [RecipientController::class, 'completedappointments']);
Route::get('/Showstylistsr', [RecipientController::class, 'show']);
Route::get('/stylist-commisionr', [RecipientController::class, 'stylistCommission']);
Route::get('/stylist-availabilities', [StylistController::class, 'show_availabilities'])->name('stylist-availabilities');
// Route::get('/all-usersr', [RecipientController::class, 'allUsersr'])->name('usersr.all');

// Toggle Status Routes
Route::prefix('toggle-status')->group(function () {
    Route::post('/service/{id}', [ServiceController::class, 'toggleStatus'])->name('toggle.service');
    Route::post('/appointment/{id}', [AppointmentController::class, 'toggleStatus'])->name('toggle.appointment');
    Route::post('/stylist/{id}', [StylistController::class, 'toggleStatus'])->name('toggle.stylist');
    Route::post('/alert/{id}', [AlertController::class, 'toggleRead'])->name('toggle.alert'); // Corrected Route Name
});

// Inventory Routes
Route::resource('inventory', InventoryController::class);

Route::get('/show-inventory', [StylistInventoryController::class, 'showinventory']);
Route::post('/decrease-inventory/{id}', [StylistInventoryController::class, 'decreaseInventory'])->name('decrease-inventory');

// Alert Routes
Route::get('/alerts', [AlertController::class, 'getAlerts'])->name('alerts.get');
Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');
Route::post('/mark-alert-as-read/{id}', [AlertController::class, 'markAsRead']);


// Stripe Payment
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe')->name('stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});


// Contact or Feedback Form
Route::post('/contact', [ContactController::class, 'sendEmail']);

// Commission Report
Route::get('/admin/export-stylist-commission', [ContactController::class, 'exportStylistCommission'])
     ->name('admin.exportStylistCommission');

