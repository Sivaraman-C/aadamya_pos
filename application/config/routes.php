<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['profile'] = 'AdminController/viewProfile';
$route['register'] = 'AdminController/adminRegisteration';
$route['registerAdmin'] = 'AdminController/registerAdmin';


$route['signin'] = 'AdminController/adminSignin';
$route['signinAdmin'] = 'AdminController/signinAdmin';
$route['updatePassword'] = 'AdminController/updatePass';
$route['uppass'] = 'AdminController/passwordUpdate';
$route['googleLogin'] = 'AdminController/googleLogin';

$route['userSignin'] = 'AdminController/loginUser';
$route['signinUser'] = 'AdminController/userLogin';

$route['registerUser'] = 'AdminController/userRegisteration';
$route['userRegister'] = 'AdminController/registerUser';

// $route['auth/google_login'] = 'auth/google_login';


$route['otp_verification'] = 'AdminController/verifyOTP';
$route['adminVerify'] = 'AdminController/adminOTPVerify';

$route['adminLogout'] = 'AdminController/adminLogout';

$route['dashboard'] = 'AdminController/adminDashboard';
$route['sales_dashboard'] = 'AdminController/salesDashboard';
$route['low-stock'] = 'AdminController/lowStocks';

$route['Pointofsales'] = 'PosController/Pointofsales';
$route['createCustomer'] = 'PosController/createCustomer';
$route['paymentComplete'] = 'PosController/paymentComplete';
$route['save_order_with_items'] = 'PosController/save_order_with_items';



$route['index'] = 'TestController/index';

// Master Pages

$route['header'] = 'AdminController/adminHeader';
$route['switchLang'] = 'AdminController/switchLang';
$route['posHeader'] = 'AdminController/posHeader';
$route['sidebar'] = 'AdminController/adminSidebar';
$route['footer'] = 'AdminController/adminFooter';

// Stocks

$route['manage-stock'] = 'StockController/manageStock';
$route['editStock'] = 'StockController/EditingStocks';
$route['updateStock'] = 'StockController/updateStocks';
$route['deleteStock'] = 'StockController/deleteStock';
$route['stock-adjustment'] = 'StockController/stockAdjustment';
$route['stock-transfer'] = 'StockController/stockTransfer';

//Inventory

$route['product_list'] = 'InventoryController/displayProduct';
$route['updateProducts'] = 'InventoryController/UpdateProduct';
$route['edit_details'] = 'InventoryController/showEditingProducts';
$route['view_details'] = 'InventoryController/viewDetails';
$route['deleteProduct'] = 'InventoryController/deleteProduct';

$route['add_product'] = 'InventoryController/loadProductsPage';
$route['loadProducts'] = 'InventoryController/loadProducts';

// Sample

$route['sample'] = 'TestController/sample';


// Reports

$route['sales-report'] = 'ReportController/salesReport';
$route['purchase-report'] = 'ReportController/purchaseReport';
$route['inventory-report'] = 'ReportController/inventoryReport';
$route['profit-loss'] = 'ReportController/profitlossReport';