<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserAuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\Authentication;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SectionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([Authentication::class])->group(function () {
    /** Store controller routes */
    Route::get('/dashboard', [DashboardController::class, "show"])->name("dashboard");
    /** END Store controller routes */

    /** Authentication routes*/
    Route::get("/logout", [UserAuthenticationController::class, "logout"])->name("logout");
    /** END Authentication routes*/


    /* User routes */
    Route::group(['prefix' => "users"], function () {
        Route::get("/", [UserController::class, "index"])->name("users.index");
        Route::delete("delete/{id}", [UserController::class, "delete"])->name("users.destroy");
        Route::get("create/", [UserController::class, "create"])->name("users.create");
        Route::post("store/", [UserController::class, "store"])->name("users.store");
        Route::get("show/{id}", [UserController::class, "show"])->name("users.show");
        Route::put("update", [UserController::class, "update"])->name('users.update');
        Route::post("permissions/update", [UserController::class, "updateUserPermissions"])->name('updateUserPermissions');
    });
    Route::group(['prefix' => "user"], function () {
        Route::get("confirm/{id}", [UserController::class, "confirm"])->name("users.confirm");
        Route::get("unConfirm/{id}", [UserController::class, "unConfirm"])->name("users.unConfirm");
    });
    /*END User routes */

    /* Start Company Routes */
    Route::group(['prefix' => "companies"], function () {
        Route::get("/", [CompanyController::class, "index"])->name("companies.index");
        Route::delete("delete/{id}", [CompanyController::class, "delete"])->name("companies.destroy");
        Route::get("create/", [CompanyController::class, "create"])->name("companies.create");
        Route::post("store/", [CompanyController::class, "store"])->name("companies.store");
        Route::get("show/{id}", [CompanyController::class, "show"])->name("companies.show");
        Route::put("update", [CompanyController::class, "update"])->name('companies.update');
    });
    /* End Company Routes */

    /* Start Company Routes */
    Route::group(["prefix" => "offices"], function () {
        Route::get("/", [OfficeController::class, "index"])->name("offices.index");
        Route::delete("delete/{id}", [OfficeController::class, "delete"])->name("offices.destroy");
        Route::get("create/", [OfficeController::class, "create"])->name("offices.create");
        Route::post("store/", [OfficeController::class, "store"])->name("offices.store");
        Route::get("show/{id}", [OfficeController::class, "show"])->name("offices.show");
        Route::put("update", [OfficeController::class, "update"])->name('offices.update');
    });
    /* End Company Routes */
    Route::group(["prefix" => "shipments"], function () {
        Route::get("/", [ShipmentController::class, "index"])->name("shipments.index");
        Route::delete("delete/{id}", [ShipmentController::class, "delete"])->name("shipments.destroy");
        Route::get("create/", [ShipmentController::class, "create"])->name("shipments.create");
        Route::post("store/", [ShipmentController::class, "store"])->name("shipments.store");
        Route::get("show/{id}", [ShipmentController::class, "show"])->name("shipments.show");
        Route::get("/get/clinet/data/{phone}", [ShipmentController::class, "getClientByPhone"])->name("shipments.getClientByPhone");
        Route::put("update", [ShipmentController::class, "update"])->name('shipments.update');
        Route::post("change/shipment/status", [ShipmentController::class, "changeStatus"])->name('shipments.updateStatus');
        Route::post("select/shipment/representative", [ShipmentController::class, "assignRepresentative"])->name('shipments.assignRepresentative');
        Route::post("select/shipment/company", [ShipmentController::class, "assignCompany"])->name('shipments.assignCompany');
        Route::post("select/shipment/office", [ShipmentController::class, "assignOffice"])->name('shipments.assignCompany');
    });
    Route::group(["prefix" => "prices"], function () {
        Route::get("/", [PriceController::class, "index"])->name("prices.index");
        Route::delete("delete/{id}", [PriceController::class, "delete"])->name("prices.destroy");
        Route::get("create/", [PriceController::class, "create"])->name("prices.create");
        Route::post("/", [PriceController::class, "store"])->name("prices.store");
        Route::get("edit/{id}", [PriceController::class, "edit"])->name("prices.edit");
        Route::put("update", [PriceController::class, "update"])->name('prices.update');
    });
    Route::group(["prefix" => "coupons"], function () {
        Route::get("/", [CouponController::class, "index"])->name("coupons.index");
        Route::delete("delete/{id}", [CouponController::class, "delete"])->name("coupons.destroy");
        Route::get("create/", [CouponController::class, "create"])->name("coupons.create");
        Route::post("store/", [CouponController::class, "store"])->name("coupons.store");
        Route::get("show/{id}", [CouponController::class, "show"])->name("coupons.show");
        Route::put("update", [CouponController::class, "update"])->name('coupons.update');
    });

    Route::group(["prefix" => "transactions"], function () {
        Route::get("/", [WalletController::class, "index"])->name("transactions.index");
        Route::delete("delete/{id}", [WalletController::class, "delete"])->name("transactions.destroy");
        Route::get("create/", [WalletController::class, "create"])->name("transactions.create");
        Route::post("store/", [WalletController::class, "store"])->name("transactions.store");
        Route::get("show/{id}", [WalletController::class, "show"])->name("transactions.show");
        Route::put("update", [WalletController::class, "update"])->name('transactions.update');
        Route::get("send/{user_id}", [WalletController::class, "send"])->name("send.transactions");
    });
    Route::group(["prefix" => "notifications"], function () {
        Route::get("/", [NotificationController::class, "index"])->name("notifications.index");
        Route::delete("delete/{id}", [WalletController::class, "delete"])->name("transactions.destroy");
        Route::get("create/", [WalletController::class, "create"])->name("transactions.create");
        Route::post("store/", [WalletController::class, "store"])->name("transactions.store");
        Route::get("show/{id}", [WalletController::class, "show"])->name("transactions.show");
        Route::put("update", [WalletController::class, "update"])->name('transactions.update');
    });

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.articles');
        Route::get('create', [ArticleController::class, 'create'])->name('articles.create');
        Route::get('/{id}', [ArticleController::class, 'show'])->name('articles.show');
        Route::post('/', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/{id}', [ArticleController::class, 'delete'])->name('articles.delete');
        Route::post('/articles/toggle-visibility/{id}', [ArticleController::class, 'toggleVisibility'])->name('articles.toggleVisibility');
    });
    Route::group(['prefix' => 'sections'], function () {
        Route::get('/', [SectionController::class, 'index'])->name('sections.sections');
        Route::get('section', [SectionController::class, 'create'])->name('sections.create');
        Route::get('/{id}', [SectionController::class, 'show'])->name('sections.show');
        Route::post('/', [SectionController::class, 'store'])->name('sections.store');
        Route::get('/sections/{article}/edit', [SectionController::class, 'edit'])->name('sections.edit');
        Route::put('/sections/{section}', [SectionController::class, 'update'])->name('sections.update');
        Route::delete('/sections/{id}', [SectionController::class, 'delete'])->name('sections.delete');
        Route::post('/sections/toggle-visibility/{id}', [SectionController::class, 'toggleVisibility'])->name('sections.toggleVisibility');
    });
});
Route::get("/", [HomeController::class, "index"]);

/** Authentication routes */
Route::get("/forgot/password", [UserAuthenticationController::class, "forgot"])->name("forgot");
Route::post("/forgot/password", [UserAuthenticationController::class, "resetPassword"])->name("resetPassword");
Route::get("/new/password/{token}", [UserAuthenticationController::class, "newPassword"])->name("newPassword");
Route::post("/change/password", [UserAuthenticationController::class, "changePassword"])->name("changePassword");
Route::get("/login", [UserAuthenticationController::class, "login"])->name("login");
Route::post("/signIn", [UserAuthenticationController::class, "signIn"])->name("signIn");
Route::get("/verifyShow", [UserAuthenticationController::class, "verifyShow"])->name("verifyShow");
Route::post("/verifyUser", [UserAuthenticationController::class, "verifyUser"])->name("verifyUser");
Route::get("/signUp", [UserAuthenticationController::class, "signUp"])->name("signUp");
Route::post("/register", [UserAuthenticationController::class, "register"])->name("register");
Route::post("/policy/show", [UserAuthenticationController::class, "showPolicy"])->name("policy.show");
Route::post("/terms/show", [UserAuthenticationController::class, "showTerms"])->name("terms.show");
Route::get("company/offices/{company_id}", [CompanyController::class, "getCompanyOffices"])->name('getCompanyOffices');
Route::get("government/areas/{government}", [ShipmentController::class, "getAreas"])->name("shipments.getAreas");
Route::get("size/price/{size}/{area}/{government}", [ShipmentController::class, "getPrice"])->name("shipments.getPrice");
/** END Authentication routes */
