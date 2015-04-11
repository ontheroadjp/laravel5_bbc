<?php namespace App\Http\Controllers;

use App\BBC;
use App\Models\Post;
use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
//		return \View::make('bbc.index')->with('posts', $posts);	
			return view('bbc.index')->with('posts', $posts);	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bbc.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreatePostRequest $request)
	{
		$req = $request->all();
		$post = new Post;
		$post->title = $req['title'];
		$post->cat_id = $req['cat_id'];
		$post->content = $req['content'];
		$post->save();
		return Redirect()->to('bbc');		
/*
		$rules = [
			'title' => 'required',
			'content' => 'required',
			'cat_id' => 'required',
		];

		$message = array(
			'title.required' => 'タイトルを入力してください',
			'content.required' => '本文を入力してください',
			'cat_id.required' => 'カテゴリーを選択してください',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->passes()) {
			$post = new Post;
			$post->title = Input::get('title');

			$post->content = Input::get('content');
		}
		 */

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		return view('bbc.single')->with('post', $post);
	}

	public function showCategory($id)
	{
		$category_posts = Post::where('cat_id', $id)->get();
		return view('bbc.category')->with('category_posts', $category_posts);
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
