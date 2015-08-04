<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Reservation;
use Session;
use App\Velo;
use Illuminate\Http\Request;

class LocationController extends Controller {


	public function __construct()
	{

		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$velos = Velo::all();
		$etape = 0;
		return view('location')->with(['velos'=>$velos, 'etape'=>$etape]);
	}


	public function create(Request $request)
	{
		$velo = Velo::findOrFail($request->input('idVelo'));
		dd($velo->reservation);
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
		//
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

	public function valider($id)
	{
		$res = Reservation::findOrFail($id);
		$user = $res->user;

		//on envoi le mail de confirmation à l'user
		//dd($user->email);
		$res->valide = 1;
		$res->save();
		Session::flash('info', "La réservation est validée, un mail a été envoyé à l'utilisateur");
		return redirect()->back();
	}

	public function archiver($id)
	{
		$res = Reservation::findOrFail($id);
		$user = $res->user;

		//on envoi le mail de confirmation à l'user
		//dd($user->email);
		$res->valide = 2;
		$res->save();
		Session::flash('info', "La réservation a bien été archivée");
		return redirect()->back();
	}

	public function refuser($id)
	{
		$res = Reservation::findOrFail($id);
		$user = $res->user;

		//on envoi le mail de confirmation à l'user
		//dd($user->email);
		$res->valide = 3;
		$res->save();
		Session::flash('info', "La réservation a bien été annulée");
		return redirect()->back();
	}

}
