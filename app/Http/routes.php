	<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.

*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', function () {
    	return view('welcome');
	});

	/*Route::get('products', function () {
    	return view('products_crud');
	});*/

	Route::get('products', 'Product\ProductController@index');
	Route::get('edit_product', 'Product\ProductController@getprod');
	Route::any('updateprod', 'Product\ProductController@update_product');
	Route::get('pharma', 'Product\ProductController@getpharma');
	Route::post('addprod', 'Product\ProductController@store');
	Route::any('create_po', 'Product\ProductController@getprod');
	Route::get('exportProduct/{param?}', 'Product\ProductController@exportProduct');
	Route::get('exportProductPharma/{param?}', 'Product\ProductController@exportProductPharma');
	
	Route::get('supplier', 'Supplier\SupplierController@index');
	Route::post('addsupp', 'Supplier\SupplierController@store');
	Route::any('updateSupplier', 'Supplier\SupplierController@updateSupplier');
	Route::get('exportSupplier/{param?}', 'Supplier\SupplierController@exportSupplier');

	Route::get('clients', 'Client\ClientController@index');
	Route::post('saveclient', 'Client\ClientController@store');
	Route::any('updateClient', 'Client\ClientController@updateClient');
	Route::get('exportClient/{param?}', 'Client\ClientController@exportClient');

	Route::get('agents', 'Agent\AgentController@index');
	Route::post('saveagent', 'Agent\AgentController@store');
	Route::any('updateAgent', 'Agent\AgentController@updateAgent');
	Route::get('exportAgents/{param?}', 'Agent\AgentController@exportAgents');
	
	Route::get('purchaseorders', 'PurchaseOrder\PurchaseOrderController@index');
	Route::get('getlatestpo', 'PurchaseOrder\PurchaseOrderController@getlatestpo');
	Route::any('savepurchaseorders', 'PurchaseOrder\PurchaseOrderController@store');
	Route::get('purchaseOrderforPrinting/{id}', 'PurchaseOrder\PurchaseOrderController@getPurchaseOrder');
	Route::get('actualpurchases/{id}', 'PurchaseOrder\PurchaseOrderController@getPOforValidation');
	//Route::get('editPurchase/{id}', 'PurchaseOrder\PurchaseOrderController@editPurchase');
	Route::get('purchasesView', 'PurchaseOrder\PurchaseOrderController@index');
	Route::any('updatePOStatus', 'PurchaseOrder\PurchaseOrderController@updateTable');
	Route::get('getpoCurrID', 'PurchaseOrder\PurchaseOrderController@getpoCurrID');

	Route::get('purchases/{id?}', 'Purchase\PurchaseController@index');
	Route::any('savepurchases', 'Purchase\PurchaseController@store');
	Route::any('updatepurchases', 'Purchase\PurchaseController@updatepurchases');
	Route::get('validatedpurchase/{id}', 'Purchase\PurchaseController@getValidatedPurchase');
	Route::get('editPurchase/{id}', 'Purchase\PurchaseController@editPurchase');
	Route::get('addpurchaseToInventoryView/{id}', 'Purchase\PurchaseController@addpurchaseToInventoryView');

	Route::any('saveToInventory', 'InventoryRecord\InventoryRecordController@store');
	Route::get('inventory', 'InventoryRecord\InventoryRecordController@index');
	Route::get('exportInventory/{param?}', 'InventoryRecord\InventoryRecordController@exportInventory');
	Route::any('create_salesInvoice', 'InventoryRecord\InventoryRecordController@getprodDetails');
	Route::any('updateInventory', 'InventoryRecord\InventoryRecordController@updateInventory');

	Route::get('invoices', 'Sale\SaleController@showInvoices');
	Route::get('viewInvoice/{id}', 'Sale\SaleController@getInvoice');
	Route::get('sales', 'Sale\SaleController@index');
	Route::any('saveSales', 'Sale\SaleController@store');
	Route::any('changesalestatus', 'Sale\SaleController@changeSaleStatus');
	Route::get('exportSales/{param?}', 'Sale\SaleController@exportSales');
	Route::get('exportInvoices/{param?}', 'Sale\SaleController@exportInvoices');

	Route::post('enterPayment', 'Payment\PaymentController@store');
	Route::get('paymentHistory/{id}', 'Payment\PaymentController@show');
	Route::get('exportPaymentHistory/{id}', 'Payment\PaymentController@exportPaymentHistory');
	
	//Route::any('addprod', array('as' => 'addprod', 'uses' => 'Product\ProductController@store'));

	Route::get('/home', 'HomeController@index');
});
