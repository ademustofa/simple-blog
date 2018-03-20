<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Image;
use Storage;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('posts.index')->withPosts($posts);

         /*return view('posts.index');*/
    }

    /*public function get_post()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.get_data_post')->withPosts($posts);
    }
*/
    public function create()
    {
        // view 
        $categories = Category::all();
        $tags       = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // validating data
         $this->validate($request, [
                'title'         => 'required|unique:posts|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required',
                'images'        => 'sometimes|image'
            ]);

        // insert data
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        if ($request->hasFile('images')) {
            $image      = $request->file('images');
            $filename   = time() . '.' . $image->getClientOriginalExtension();
            $location  = public_path('images/'. $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        /*dd($request);*/

        // set flashdata with success message
        Session::flash('success', 'The Blog was successfully save!');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
         }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
         }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validating data
        $this->validate($request, [
                'title'         => 'required|max:255',
                'slug'          => "required|alpha_dash|min:5|max:255, $id",
                'category_id'   => 'required|integer',
                'body'          => 'required',
                'images'        => 'image'
        ]);

        // inserting data
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        if ($request->hasFile('images')) {
            $image      = $request->file('images');
            $filename   = time() . '.' . $image->getClientOriginalExtension();
            $location   = public_path('images/'. $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $post->image;

            $post->image = $filename;

            Storage::delete($oldFilename);
        }

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else{
            $post->tags()->sync(array());
        }

        

        // set flashdata with success message
        Session::flash('success', 'The Post was successfully Update!');
 
        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();

        Storage::delete($post->image);

        $post->delete();

        // set flashdata with success message
        Session::flash('success', 'The Post was successfully Delete!');
 
        // redirect with flash data to posts.show
        return redirect()->route('posts.index');
    }
}
