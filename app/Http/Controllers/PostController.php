<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Request;
use Validator;
use Session;
use Input;
use Illuminate\Support\Str;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$articles = Post::where('publie', '=', true)->orderBy('created_at', 'desc')->paginate(5);
		$articles->setPath('blog');
		return view('blog')->with(['articles' => $articles]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$regles = array(
			'titre' => 'required|min:5|max:40',
			'contenu' => 'required|min:200',
			'chapo' => 'required|max:300',
			'publie'=> 'required',
			'photo' => 'image'
		);

		$validation = Validator::make(Request::all(), $regles);

		if($validation->fails()){
			return redirect()->back()->withErrors($validation)->withInput();
		} else {

			Request::input('publie') == 'oui'? $publie = true : $publie = false;
			$slug = Str::slug(Request::input('titre'));
			$photo = Input::file('photo');

			if ($photo!=null && $photo->isValid()) {

				$destinationPath = public_path().'\uploads\posts'; // upload path
				$extension = $photo->getClientOriginalExtension(); // getting image extension
				$fileName = uniqid('post'.$slug.'-').'.'.$extension; // renameing image
				$uploadSuccess = $photo->move($destinationPath, $fileName);
				if($uploadSuccess){
					$path = asset('uploads/posts').'/'.$fileName;
				}
			} else {

				$photo = '';
			}

			$article = Post::create([
				'titre' => Request::input('titre'),
				'contenu' => Request::input('contenu'),
				'slug' => $slug,
				'chapo'=> Request::input('chapo'),
				'publie' => $publie,
				'photo' => $path
			]);

		}
		return redirect()->route('post.show', ['post'=>$article->id]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Post::findOrFail($id);
		return view('articles.article')->with(['article' => $article]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$post = Post::findOrFail($id);
		return view('articles.editer')->with(['post' => $post]);

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
			'titre' => 'required|min:5|max:40',
			'contenu' => 'required|min:200',
			'chapo' => 'required|max:300',
			'publie'=> 'required',
			'photo' => 'image'
		);
		$article = Post::findOrFail($id);
		$validation = Validator::make(Request::all(), $regles);

		if($validation->fails()){
			return redirect()->back()->withErrors($validation)->withInput();
		} else {

			$photo = Input::file('photo');
			$slug = Str::slug(Request::input('titre'));

			if ($photo!=null && $photo->isValid()) {

				$destinationPath = public_path().'\uploads\posts'; // upload path
				$extension = $photo->getClientOriginalExtension(); // getting image extension
				$fileName = uniqid('post'.$slug.'-').'.'.$extension; // renameing image
				$uploadSuccess = $photo->move($destinationPath, $fileName);
				if($uploadSuccess){
					$path = asset('uploads/posts').'/'.$fileName;
				}
			} else {

				$path= '';
			}


			$article->titre = Request::input('titre');
			$article->contenu = Request::input('contenu');
			$article->slug = $slug;
			$article->chapo = Request::input('chapo');
			$article->photo = $path;
			Request::input('publie') == 'oui'? $publie = true : $publie = false;
			$article->publie = $publie;
			$article->save();

		}
		return redirect()->route('post.show', ['post'=>$id]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Post::findOrFail($id);
		$article->delete();
		Session::flash('info', "L'article a bien été supprimé");
		return redirect('/admin/dashboard');
	}

}
