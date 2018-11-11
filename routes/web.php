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

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('member-work-slots-monthly', 
	['as' => 'pages.member-work-slots-monthly', 'uses' => 'PagesController@getMemberWorkSlotsMonthly'])
	->middleware('auth');
Route::get('member-work-slots-monthly/{month}/{year}/', 
	['as' => 'pages.member-work-slots-monthly', 'uses' => 'PagesController@getMemberWorkSlotsMonthly'])
	->middleware('auth');
Route::get('/', 'PagesController@getIndex')->middleware('auth');
Route::get('/report', 'PagesController@getReport');

Route::get('work-period-slots/date/', 
	['as' => 'work-period-slots.date', 'uses' => 'WorkPeriodSlotController@date'])
	->middleware('auth');
Route::get('work-period-slots/date/{date}', 
	['as' => 'work-period-slots.date', 'uses' => 'WorkPeriodSlotController@date'])
	->where('date', '^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$')
	->middleware('auth');
Route::resource('work-period-slots', 'WorkPeriodSlotController')->middleware('auth');
Route::get('select-work', 
	['as' => 'select-work.index', 'uses' => 'WorkPeriodController@index'])
	->middleware('auth');
Route::post('select-work', 
	['as' => 'select-work.assign', 'uses' => 'WorkPeriodSlotController@assign'])
	->middleware('auth');
Route::resource('work-periods', 'WorkPeriodController')->middleware('auth');

Route::resource('users', 'UserController')->middleware('auth');
Route::get('user-details', ['as' => 'user-details.show', 'uses' => 'UserController@show'])->middleware('auth');
Route::get('edit-user', ['as' => 'user-details.edit', 'uses' => 'UserController@edit'])->middleware('auth');
