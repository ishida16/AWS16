<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
	public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
	{
	    //return $post->get();//$postの中身を戻り値にする。
	    //return view('posts.index')->with(['posts' => $post->getByLimit()]);
	    return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
	}
	
	public function show(Post $post)
	{
	    return view('posts.show')->with(['post' => $post]);
	 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
	}
}
