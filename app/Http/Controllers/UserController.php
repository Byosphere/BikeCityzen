<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Request;
use Hash;
use Auth;

class UserController extends Controller {

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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return view('profile')->with(['user'=>$user]);
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

		if(Auth::user() == User::findOrFail($id)){

			$user = Auth::user();

			if(Request::input('oldPass') == null){


				$regles = array(
					'name' => 'max:255',
					'email' => 'email|max:255|unique:users',
					'phone' => 'unique:users|digits:10'
				);

				$validation = Validator::make(Request::all(), $regles);

				if($validation->fails()){

					return redirect()->back()->withErrors($validation)->withInput();

				} else {

					if(Request::input('name') !=null) {
						$user->name = Request::input('name');

					}
					if(Request::input('email') !=null) {
						$user->email = Request::input('email');

					}
					if(Request::input('phone') !=null) {
						$user->phone = Request::input('phone');

					}

					$user->save();

					return redirect('/user/'.Auth::user()->id);
				}

			} else {

				$regles = array(
					'oldPass' => 'required|min:1', // A MODIFIER
					'pass' => 'required|confirmed|min:6'
				);

				$validation = Validator::make(Request::all(), $regles);

				if($validation->fails()){

					return redirect()->back()->withErrors($validation)->withInput();

				} else {

					if(Hash::check(Request::input('oldPass'), Auth::user()->password)){

						$user->password = bcrypt(Request::input('pass'));

						$user->save();

						return redirect('/user/'.Auth::user()->id);
					} else {

						Session::flash('message', 'Veuillez correctement entrer votre ancien mot de passe');
						return redirect()->back();
					}
				}
			}

		} else {

			return response('Unauthorized.', 401);

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
		//
	}

}
