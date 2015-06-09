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
use Response;
use Isabry\Sentinel\Models\Zone;

class ZonesController extends Controller {

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
		// $zones = Zone::where('enable', 1)->with('devices')->paginate(10);
		$zones = Zone::with('devices')->paginate(10);
		Debugbar::info("Devices");
		Debugbar::info($zones->toArray());

		return View::make('sentinel::zones.index')
						->with('title', 'Zones List')
						->with(compact('zones'));
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
		$zone = Zone::findOrFail($id);
		Debugbar::info("Zone");
		Debugbar::info($zone->toArray());

		Debugbar::info($zone->bounds);
		$bounds['name'] = $zone->name;
		$bounds['color'] = $zone->color;
		$bounds[$zone->type] = unserialize($zone->bounds);
		Debugbar::info($bounds);

		// return View::make('sentinel::zones.zone')
		// 				->with('title', 'Zone Debug')
		// 				->with(compact('zone'));

		$response = Response::json($bounds);
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
