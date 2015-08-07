<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Reservation;
use Session;
use App\Velo;
use App\Demijournee;
use Illuminate\Http\Request;
use Auth;
use Validator;

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
	public function store(Request $request)
	{
		$nbRes = Reservation::where('user_id', '=', Auth::user()->id)->where('valide', '<=', 1)->count();

		if($nbRes <3){

			$velo = Velo::findOrFail($request->input('idVelo'));
			// Création d'une nouvelle reservation
			$reservation = new Reservation(['valide'=>0]);
			$reservation->user()->associate(Auth::user());
			$reservation->velo()->associate($velo);
			$reservation->save();

			// Création des demi journéées choisies
			$values = $request->all();
			$keys = array_keys($values);
			$newDJ = array();
			unset($keys[0]); //on retire le token

			for ($i=1; $i < sizeof($values)-2; $i+=2) { // -2 pour retirer le veloId

				//control des champs
				$regles = array(
					$keys[$i] => 'required',
					$keys[$i+1] => 'required',
				);

				$validation = Validator::make($values, $regles);
				if($validation->fails()){


					Session::flash('info', 'Le formulaire envoyé comportait des champs vides !');
					$reservation->delete();
					foreach ($newDJ as $dj) {
						$dj->delete();
					}
					return redirect()->back();

				} else {
					//formattage de la date
					$date = explode('-', $values[$keys[$i]]);
					$date = $date[2].'-'.$date[1].'-'.$date[0];

					$demijournee = new Demijournee(['date'=>$date, 'periode'=>$values[$keys[$i+1]]]);
					$demijournee->reservation()->associate($reservation);
					$demijournee->save();
					$newDJ[] = $demijournee;
				}

			}
			return redirect()->route('location.show', ['location'=>$reservation->id]);

		} else {

			Session::flash('info', 'Vous ne pouvez pas avoir plus de trois réservations en attente ! Merci de votre compréhension.');
			return redirect()->back();
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$res = Reservation::findOrFail($id);
		return view('reservation')->with(['res'=>$res]);
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
