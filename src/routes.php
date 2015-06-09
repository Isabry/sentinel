<?php

//-----------------------------------------------------------------------------
// Users
// Route::group(['permissions' => ['admin', 'manager']], function () {
	Route::resource('devices', 'Isabry\Sentinel\Controllers\DevicesController');
	Route::post('devices/{deviceid}/enable', [
		'uses' => 'Isabry\Sentinel\Controllers\DevicesController@enable',
		'as' => 'devices.enable',
	]);
// });

//-----------------------------------------------------------------------------
// Users
// Route::group(['permissions' => ['admin', 'manager']], function () {
	Route::resource('zones', 'Isabry\Sentinel\Controllers\ZonesController');
	Route::post('zones/{zoneid}/enable', [
		'uses' => 'Isabry\Sentinel\Controllers\ZonesController@enable',
		'as' => 'zones.enable',
	]);
// });

//-----------------------------------------------------------------------------
// Users
// Route::group(['permissions' => ['admin', 'manager']], function () {
	Route::resource('tracker', 'Isabry\Sentinel\Controllers\TrackerController', [
		'only' => ['index', 'show', 'destroy'],
	]);
// });
