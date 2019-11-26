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
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
    return view('welcome');
	})->name('index');

   Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

});



Auth::routes();

Route::middleware(['auth'])->group(function () {
   
   Route::get('/home', 'HomeController@index')->name('home');
   
   Route::get('/income','HomeController@incomePage')->name('income');
   Route::get('/expense','HomeController@expensepage')->name('expense');
   Route::get('/history','HomeController@historyPage')->name('history');
   Route::get('/profile','HomeController@profilePage')->name('profile');
   Route::post('/addincome','Expense@addIncome');
   Route::post('/changepass','HomeController@changePassword');
   Route::post('/addexpense','Expense@addExpense')->name('addexpense');
   Route::post('/delete/{id}','Expense@deleteExpense')->name('delete');
    Route::get('/edit/{id}','Expense@retrieve')->name('getedit');
    Route::post('/edit','Expense@editExpense')->name('edit');
    Route::get('/getdata/{id}','HomeController@retrievedata')->name('getdata');
    Route::get('/getwkdata/{id}','HomeController@retrieveweekdata');
    Route::get('/getyrdata/{id}','HomeController@retrieveyeardata');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
