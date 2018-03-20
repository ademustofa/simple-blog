<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{

	public function getIndex()
	{
		$posts  = Post::orderBy('created_at', 'desc')->paginate(10);

		return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug)
    {
    	$post = Post::where('slug', '=', $slug)->first();

    	/*dd($post->comments);
*/
    	return view('blog.single')->withPost($post);
    }
}
