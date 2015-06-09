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
use Redirect;
use Response;
use Isabry\Sentinel\Models\Device;
use Isabry\Sentinel\Models\Track;

class TrackerController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		// $this->middleware('roles');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$devices = Device::with('users')->get();
		Debugbar::info("Devices");
		Debugbar::info($devices->toArray());

		return View::make('sentinel::tracker.index')
						->with('title', 'Map List')
						->with(compact('devices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tracks = Track::where('device_id', '=', $id)->get();
		// Debugbar::info("Tracks");
		// Debugbar::info($tracks->toArray());

		// return View::make('sentinel::tracker.tracks')
		// 				->with('title', 'Tracks List')
		// 				->with(compact('tracks'));

		$response = Response::json($tracks->toArray());
		$response->header('Content-Type', 'application/json');

		return $response;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
