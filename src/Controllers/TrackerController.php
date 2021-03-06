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
use Request;
use Response;
use Log;
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
		// $this->middleware('auth');
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
	 * Store a new position.
	 *
	 * @return Response
	 */
	public function addPosition(Request $request)
	{
		// $position = Request::all();
		// Log::info("In Coming Data", $position );

		$track = new Track;

		$track->device_id = 1;
		$track->latitude  = Request::get('latitude');
		$track->longitude = Request::get('longitude');
		$track->accuracy  = Request::get('accuracy', '');
		$track->altitude  = Request::get('altitude', '');
		$track->speed     = Request::get('speed', '');
		$track->timestamp = Request::get('timestamp', '');

		
		$track->save();

		$data = [
			'message' => 'add position',
		];
		$response = Response::json($data);
		$response->header('Content-Type', 'application/json');

		return $response;
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
	public function store(Request $request)
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
