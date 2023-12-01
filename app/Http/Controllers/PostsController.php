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
         $posts = Post::orderBy('id', 'desc')->cursorPaginate(10); // withThrashed() chained on query will return collection including `deleted_at` column
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
    {   
        $post->delete(); // now it will not delete from DB it will just fill field `deleted_at`
        return redirect()->route('posts.index');
    }

    public function removeAllFromSoftDeleted()
    {
        Post::onlyTrashed()->restore();
        return redirect()->route('posts.index');
    }

    public function removeSingleFromSoftDeleted(Post $post)
    {
        Post::onlyTrashed()->where('id', 109)->forceDelete();
        return redirect()->route('posts.index');
    }

    public function replicatePost()
    {
        $post = Post::find(102);
        $replicatedWithUnique = $post->replicate()->fill(['title'=>'Unique on DB lvl', 'slug' => 'unique-on-db-as-well']); // Use fill() to overwrite replicated data 
                                                        // (example: title, slug are unique. CAN`T BE SAME)
                                                        
        dd($replicatedWithUnique); // will return new fresh instance of model post with filled data
        // $replicatedWithUnique->save(); // if you need to save replicated instance
    }
}
