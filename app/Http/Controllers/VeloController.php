<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Velo;
use Request;
use Validator;
use Input;
use Session;

class VeloController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('velos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$regles = array(
			'modele' => 'required|min:5|max:40',
			'categorie' => 'required',
			'image' => 'image|required'
		);
		$validation = Validator::make(Request::all(), $regles);

		if($validation->fails()){
			return redirect()->back()->withErrors($validation)->withInput();
		} else {

			$image = Input::file('image');
			// checking file is valid.
			if ($image->isValid()) {

				$destinationPath = public_path().'\uploads\velos'; // upload path
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$fileName = uniqid('velo-').'.'.$extension; // renameing image
				$uploadSuccess = $image->move($destinationPath, $fileName);
				if($uploadSuccess){
					$path = asset('uploads/velos').'/'.$fileName;
				}
			}

			$velo = Velo::create([
				'modele' => Request::input('modele'),
				'categorie' => Request::input('categorie'),
				'image' => $path
				]);

		}
		return redirect('/admin/dashboard');
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
		$velo = Velo::findOrFail($id);
		return view('velos.edit')->with(['velo'=>$velo]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$regles = array(
			'modele' => 'required|min:5|max:40',
			'categorie' => 'required',
			'image' => 'image'
		);
		$velo = Velo::findOrFail($id);
		$validation = Validator::make(Request::all(), $regles);

		if($validation->fails()){
			return redirect()->back()->withErrors($validation)->withInput();
		} else {

			$image = Input::file('image');

			// checking file is valid.
			if ($image!=null && $image->isValid()) {

				$destinationPath = public_path().'\uploads\velos'; // upload path
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$fileName = uniqid('velo-').'.'.$extension; // renameing image
				$uploadSuccess = $image->move($destinationPath, $fileName);

				if( file_exists ( $velo->image))
					unlink($velo->image);

				if($uploadSuccess){
					$path = asset('uploads/velos').'/'.$fileName;
				}
				$velo->image = $path;
			}

			$velo->modele = Request::input('modele');
			$velo->categorie = Request::input('categorie');
			$velo->save();
			return redirect('/admin/dashboard');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$velo = Velo::findOrFail($id);
		if( file_exists ( $velo->image))
			unlink($velo->image);
		$velo->delete();
		Session::flash('info', "L'élément a bien été supprimé");
		return redirect('/admin/dashboard');
	}

}
