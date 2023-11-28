<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
    {   // Track changes on user input and data in table and compare them
        $post->title = "Check changes on title if value has been set to different value";

        // (bool) isDirty() check if attribute of MODEL has been changed before save
        // isDirty() can accept params as column names to checked or default check all fields
        // dd($post->isDirty(['title','slug'])); // return true if title has been changed or false if its not - its not same, its dirty
        // if($post->isDirty()){ // true if changed are made but forgot to save them
        //     $post->save();
        // }else{
        //     echo "You didn`t save changes";
        // }

        // (bool) isClean() check if all attributes of MODEL has been changed before save
        // isClean() is same like isDirty() but revers
        // dd($post->isClean()); // return false if its changed and true if its clean - its the same, its clean
        // if($post->isClean()){ // false if changed are made but forgot to save them
        //     echo "You didn`t save changes";
        // }else{
        //     $post->save();
        // }

        // (bool) wasChanged() check if attributes of MODEL has been changed after saving
        $post->save(); // if data is saved with changes wasChanged() return true if data saved without changes wasChanged() return false
        dd($post->wasChanged()); // return true if changed are made and false if its not - after saving data


        // return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
