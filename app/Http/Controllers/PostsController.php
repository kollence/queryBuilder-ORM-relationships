<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // $posts = Post::all(); // retrieve all the posts from the database
        // $posts = DB::table('posts')->get(); // retrieve all the posts from the database but little bit faster with Query Builder
        //  $posts = Post::paginate(10); // paginate the posts
        //  $posts = Post::simplePaginate(10); // paginate the posts
         $posts = Post::orderBy('id', 'desc')->cursorPaginate(10); // paginate the posts using cursor as pointer to next set. GOOD for large amount of data
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {                   
        
        $post = Post::create([ 
            'user_id' => $request->user_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'min_to_read' => $request->min_to_read,
        ]);
        
        dd($post);// return new Model with filled data or matched object
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) // DEFAULT match passed value with `id`
    {
        dd($post); // return post or throw Exception NOT FOUND
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {   
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {   // destroy() deletes one or multiple row(s) based on passed array of id(s)
        // dd(Post::destroy([109, 108])); // return sum of affected rows that has been deleted
        Post::destroy([107, 106]); // delete multiple rows
        return redirect()->route('posts.index');//redirect
    }
}
