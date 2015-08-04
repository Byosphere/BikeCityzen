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
        $reservations = Reservation::where('valide', '<', 2)->get();
        $velos = Velo::all();
        return view('admin.dashboard')->with(['posts'=>$posts, 'reservations'=>$reservations, 'velos' => $velos]);
    }

    public function listeRes()
    {
        $res = Reservation::orderBy('updated_at', 'desc')->take(50)->get();
        return view('admin.listeRes')->with(['reservations'=>$res]);

    }

    public function listePosts()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('admin.listePosts')->with(['posts'=>$posts]);

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
