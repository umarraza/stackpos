<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Auth::routes();

Route::get('/login', function () {
    return view('auth.login');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Invoice Routes
Route::get('/invoice/{id}'		, 	'InvoiceController@index');	// Invoice Detail
Route::get('/invoice-sale/{id}' , 	'InvoiceController@saleInvoice');	// Sale Invoice Detail
// Bussiness Routes
Route::get('/total-bussiness'	, 	'BussinessController@index')->middleware('employee');	// Total Bussiness

// Payment Routes
Route::get('/add-payments-supplier-form/{id}', 	'PaymentController@addPaymentSupplierForm')->middleware('employee');		
Route::post('/add-payments-supplier'		 , 	'PaymentController@addPaymentSupplierStore')->middleware('employee');

Route::get('/add-payments-customer-form/{id}', 'PaymentController@addPaymentCustomerForm');		// Add Payment Customer Form
Route::post('/add-payments-customer', 'PaymentController@addPaymentCustomerStore');				// Add Payment Customer Store

// Supplier Routes
Route::get('/add-suppliers-form'       , 	'SupplierController@showAddSupplierForm')->		middleware('employee');	
Route::get('/edit-supplier-form/{id}'  , 	'SupplierController@editSupplierForm')->   		middleware('employee'); 	
Route::get('/show-suppliers'           , 	'SupplierController@showSuppliers')->	   		middleware('employee');		
Route::get('/supplier-delete/{id}'     , 	'SupplierController@supplierDelete')->	   		middleware('employee');		
Route::post('/add-suppliers'           , 	'SupplierController@addSupplier')->		   		middleware('employee');				
Route::post('/supplier-update'         , 	'SupplierController@supplierUpdate')->	   		middleware('employee');			
Route::get('/view-supplier-detail/{id}', 	'SupplierController@supplierView')->	   		middleware('employee');	

// Customers Routes
Route::get('/add-customers-form'	   , 	'CustomerController@showAddCustomerForm');	// Add Customer Form
Route::get('/show-customers'		   , 	'CustomerController@showCustomers');				// Show Customers
Route::post('/add-customers'		   , 	'CustomerController@addCustomer');				// Store Customer
Route::post('/customer-update'		   , 	'CustomerController@customerUpdate');			// Update Customer
Route::get('/customer-delete/{id}'	   , 	'CustomerController@customerDelete');		// Delete Supplier
Route::get('/edit-customer-form/{id}'  , 	'CustomerController@editCustomerForm'); 	// Edit Customer Form
Route::get('/view-customer-detail/{id}', 	'CustomerController@customerView');	// View Particular Customer

// Purchase Routes
Route::get('/new-purchase-form'		   , 	'PurchaseController@showPurchaseForm')->middleware('employee');
Route::post('/new-purchase-store'	   , 	'PurchaseController@newPurchaseStore')->middleware('employee');		
Route::get('/view-purchase-detail/{id}', 	'PurchaseController@purchaseView')->middleware('employee');	

// Sale Routes
Route::get('/new-sales-form'		   , 	'SaleController@showSalesForm');		
Route::post('/new-sale-store'		   , 	'SaleController@newSaleStore');		
Route::get('/get-product-data'		   , 	'SaleController@getProductData');	
Route::get('/view-sale-detail/{id}'	   , 	'SaleController@saleView');	

// Employee Routes 
Route::get('/new-employee'			   , 	'EmployeController@newEmployee')->middleware('employee');
Route::post('/store-employee'		   , 	'EmployeController@storeEmploye')->middleware('employee');
Route::get('/show-employes'			   , 	'EmployeController@showEmployes')->middleware('employee');	
Route::get('/employee-delete/{id}'     , 	'EmployeController@employeeDelete')->middleware('employee');		
Route::get('/edit-employee-form/{id}'  , 	'EmployeController@editEmployeeForm')->middleware('employee'); 	
Route::post('/employee-update'         , 	'EmployeController@employeeUpdate')->middleware('employee');			

// Fixed Expenses Routes
Route::get('/new-fixed-expense-form'      ,   'FixedExpenseController@newFixedExpenseForm')->middleware('employee');	// New Fixed Expense Form
Route::get('/edit-fixed-expense-form/{id}',   'FixedExpenseController@editFixedExpenseForm')->middleware('employee');		// Edit Brand Form
Route::get('/show-fixed-expenses'         ,   'FixedExpenseController@showFixedExpenses')->middleware('employee');			// Show Fixed Expense

Route::get('/fixed-expense-delete/{id}'   ,   'FixedExpenseController@fixedExpenseDelete')->middleware('employee');	// Delete Fixed Expense
Route::post('/new-fixed-expense-store'    ,   'FixedExpenseController@newFixedExpenseStore')->middleware('employee');	// Store Fixed Expense
Route::post('/fixed-expense-update'       ,   'FixedExpenseController@fixedExpenseUpdate')->middleware('employee');		// Update Fixed Expense



// Brand routes
Route::get('/new-brand-form'         ,   'BrandController@newBrandForm')->middleware('employee');				// Add Brand Form
Route::get('/edit-brand-form/{id}'   ,   'BrandController@editBrandForm')->middleware('employee');		// Edit Brand Form
Route::get('/show-brands'            ,   'BrandController@showBrands')->middleware('employee');					// Show Brands

Route::get('/brand-delete/{id}'      , 	 'BrandController@brandDelete')->middleware('employee');			// Delete Brand
Route::post('/brand-update'          , 	 'BrandController@brandUpdate')->middleware('employee');				// Update Brand
Route::post('/new-brand-store'       , 	 'BrandController@newBrandStore')->middleware('employee');			// Store Brand



// Product routes
Route::get('/new-product-form' 		, 'ProductController@newProductForm');		// Add Product Form
Route::get('/edit-product-form/{id}', 'ProductController@editProductForm')->middleware('employee')->middleware('employee'); // Edit Product Form
Route::get('/show-products'			, 'ProductController@showProducts');				// Show Products

Route::get('/product-delete/{id}'	, 'ProductController@productDelete')->middleware('employee');		// Delete Product
Route::post('/new-product-store'	, 'ProductController@newProductStore')->middleware('employee');		// Store Product
Route::post('/product-update'		, 'ProductController@productUpdate')->middleware('employee');			// Update Product


// Day Book Routes
Route::get('/cuurent-day-report'	, 'DayBookController@dailyAccountsReport')->middleware('employee');
