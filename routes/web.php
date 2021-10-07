<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\DashboardController;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\CategoryController;
 use App\Http\Controllers\PurchaseController;
<<<<<<< HEAD
 use App\Http\Controllers\PurchasePdfController;
=======

>>>>>>> 347821660e737683721e995fe066191c4a2e7b37
 use App\Http\Controllers\ProductController;
 use App\Http\Controllers\PdfController;
 use App\Http\Controllers\SupplierController;
 use App\Http\Controllers\StockController;
 use App\Http\Controllers\Auth\LoginController as Userlogin ;
 use App\Events\MyEvent;
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
// Route::get('/', function () {
// return view('login.index');
// });

// auth route for both
// Route::group(['middleware'=>['auth']], function(){
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// });

Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('home');


 Route::group(['middleware'=>'guest'],function(){
    Route::get('/',[ UserController::class,'loginview'])->name('user.login');
    Route::post('login',[ UserController::class,'loginverify'])->name('user.verify');

});


Route::group(['middleware'=>['auth']],function(){
  Route::post('logout',[UserController::class,'logout'])->name('user.logout');
});


Route::middleware(['auth'])->group(function(){
    Route::get('home',[UserController::class,'Dashboard'])->name('dashboard');

// super admin
Route::get('/add/admin', [UserController::class, 'AddAdmin'])->name('add.admin');
Route::get('/admin/list', [UserController::class, 'AdminList'])->name('admin.list');
Route::get('/edit/admin/{id}', [UserController::class, 'EditAdmin'])->name('EditAdmin');
Route::post('/update/admin/{id}', [UserController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::get('/delete/admin/{id}', [UserController::class, 'DeleteAdmin'])->name('DeleteAdmin');
Route::post('/add/admin', [UserController::class, 'StoreAdmin'])->name('StoreAdmin');



///// Category start///
Route::get('/add/category',  [CategoryController::class, 'AddCategory'])->name('add.category');
Route::post('/add/category',  [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/category/list', [CategoryController::class, 'CategoryList'])->name('category.list');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');
/////Category end///

///// product start///
Route::get('/add/product',   [ProductController::class,   'AddProduct'])->name('add.product');
Route::get('/show/product',   [ProductController::class,   'showProduct'])->name('show.product');
Route::post('/add/product',  [ProductController::class, 'StoreProduct'])->name('store.product');
Route::get('/edit/product/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
Route::post('/update/product/{id}', [ProductController::class, 'UpdateProduct'])->name('update.product');
Route::get('/delete/product/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');
///// product end///


/// manager start ////
Route::get('/add/manager', [UserController::class, 'ManagerView'])->name('add.manager');
Route::post('/add/manager', [UserController::class, 'ManagerStore'])->name('manager.store');
Route::get('/show', [UserController::class, 'Managershow'])->name('show.manager');
// Route::post('/store', [UserController::class, 'ManagerStore'])->name('manager.store');
Route::get('/edit/{id}', [UserController::class, 'ManagerEdit'])->name('manager.edit');
Route::post('/edit/{id}', [UserController::class, 'ManagerUpdate'])->name('ManagerUpdate');
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('manager.delete');
/// manager end////

//pdf start//
Route::get('/pdf', [PdfController::class, 'CreatePdf'])->name('create.pdf');
Route::get('/downloadpdf', [PdfController::class, 'download'])->name('download');
//pdf end//

//password change
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('superadmin.admin_change_password');
////Admin update password
Route::post('/update/change/password/', [AdminController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
Route::get('/notifications',[UserController::class,'Notification'])->name('notification');

});



///// purchase start///
Route::get('/add/purchase',   [PurchaseController::class,   'AddPurchase'])->name('add.purchase');
Route::get('/show/purchase',   [PurchaseController::class,   'showPurchase'])->name('show.purchase');
Route::post('/add/purchase',  [PurchaseController::class, 'StorePurchase'])->name('store.purchase');
Route::get('/edit/purchase/{id}', [PurchaseController::class, 'EditPurchase'])->name('edit.purchase');
Route::post('/edit/purchase/{id}', [PurchaseController::class, 'UpdatePurchase'])->name('update.purchase');
// Route::post('/update/purchase/{id}', [PurchaseController::class, 'UpdatePurchase'])->name('update.purchase');
Route::get('/delete/purchase/{id}', [PurchaseController::class, 'DeletePurchase'])->name('delete.purchase');

/// Supplier start ////
Route::get('/add/supplier', [SupplierController::class, 'SupplierView'])->name('add.Supplier');

Route::get('/show/supplier', [SupplierController::class, 'Suppliershow'])->name('show.Supplier');

Route::post('/store', [SupplierController::class, 'SupplierStore'])->name('Supplier.store');


Route::get('/supplier/edit/{supplier_id}', [SupplierController::class, 'SupplierEdit'])->name('Supplier.edit');
Route::post('/update/{id}', [SupplierController::class, 'SupplierUpdate'])->name('SupplierUpdate');




// Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('Supplier.delete');
Route::get('/supplier/destroy/{supplier_id}', [SupplierController::class, 'Supplierdestroy']);
/// Supplier end////

<<<<<<< HEAD

//dom pdf

Route::get('/get/purchase',[PurchasePdfController::class,'getPurchase'])->name('purchase.pdf');
Route::get('/download/pdf',[PurchasePdfController::class,'downloadPDF' ])->name('download.pdf');
=======
// stock view
Route::get('/stock/list', [StockController::class, 'StockList'])->name('stock.list');
>>>>>>> 347821660e737683721e995fe066191c4a2e7b37
