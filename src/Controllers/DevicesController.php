<?php
/**
 * @package   isabry/sentinel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentinel
 */
namespace Isabry\Sentinel\Controllers;

use Auth;
use View;
use Debugbar;
use URL;
use Isabry\Sentinel\Models\Device;

class DevicesController extends Controller {

	/**
	 * Create a new controller instance.
	 *-------------------------------------------------------------------------
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		// $this->middleware('roles');
	}

	/**
	 * Display a listing of the resource.
	 *-------------------------------------------------------------------------
	 * @return Response
	 */
	public function index()
	{
		// $devices = Device::where('enable', 1)->with('users')->paginate(10);
		$devices = Device::with('users')->paginate(10);
		Debugbar::info("Devices");
		Debugbar::info($devices->toArray());

		return View::make('sentinel::devices.index')
						->with('title', 'Devices List')
						->with(compact('devices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *-------------------------------------------------------------------------
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *-------------------------------------------------------------------------
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *-------------------------------------------------------------------------
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *-------------------------------------------------------------------------
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *-------------------------------------------------------------------------
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *-------------------------------------------------------------------------
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
