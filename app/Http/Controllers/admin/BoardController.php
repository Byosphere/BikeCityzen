<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Reservation;
use App\Velo;
use Illuminate\Http\Request;
use App\Services\Demijournee;

class BoardController extends Controller {


	public function __construct()
	{
		$this->middleware('admin');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->take(5)->get();
		$reservations = Reservation::where('valide', '=', false)->get();
		$velos = Velo::all();
		$demijournee = new Demijournee();
		
		return view('admin.dashboard')->with(['posts'=>$posts, 'reservations'=>$reservations, 'demijournee' => $demijournee, 'velos' => $velos]);
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
