<?php

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
// App\User::create([
//     'name' => 'Victor',
//     'email' => 'victorcantun@gmail.com',
//     'password' => bcrypt('1234'),
//      'role_id' => '2'
// ]);

 //Route::get('requi', function() {
 //return \App\Role::all();
   // return \App\Requisition::with('coordinations')->get();
 //});
//DB::listen(function ($query){
//echo"<pre>{$query->sql}</pre>";
//});

Route::get('/', function (){
    return view('welcome');
});
     /*Route::get('/prueba', function () {
    return \App\Requisition::with(['coordinations','departments'])->get();
});
*/
Route::get('activities/exportExcel', 'ActivityController@exportExcel')->name('activities.excel');
Route::get('requisitions/{requisition}/load', 'RequisitionsController@load')->name('requisitions.load');
Route::put('requisitions/{requisition}/upload', 'RequisitionsController@upload')->name('requisitions.upload');
Route::get('requisitions/authorized', 'RequisitionsController@authorized')->name('requisitions.authorized');
Route::get('requisitions/authorized/{requisition}', 'RequisitionsController@show_authorized')->name('requisitions.show_authorized');
Route::get('quotes/{quotes}/addproviders', 'QuotesController@addproviders')->name('quotes.addproviders');
Route::get('purchased/{purchased}/load', 'PurchasedController@load')->name('purchased.load');
Route::put('purchased/{purchased}/upload', 'PurchasedController@upload')->name('purchased.upload');
Route::resources([
    'users' => 'UsersController',
    'levels' => 'RolesController',
    'departments' => 'DepartmentController',
    'coordinations' => 'CoordinationController',
    'providers' => 'ProviderController',
    'requisitions' => 'RequisitionsController',
    'mir' => 'MirController',
    'activities' => 'ActivityController',
    'quotes'=> 'QuotesController',
    'purchased' => 'PurchasedController',
    'productos' => 'ProductsController'
]);

//Route::resource('users', 'UsersController');

//Route::resource('providers', 'ProviderController');

//Route::resource('departments', 'DepartmentController');

//Route::resource('coordinations', 'CoordinationController');


//Route::resource('requisitions','RequisitionsController');

//Route::resource('mir', 'MirController');

//Route::resource('res', 'RolesController');


//Route::resource('activities', 'ActivityController');

// Route::get('/users/create', function(){
//     return view('users.create');
// });


Auth::routes(['register' => false]);

