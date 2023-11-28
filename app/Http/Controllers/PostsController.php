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
         $posts = Post::cursorPaginate(10); // paginate the posts using cursor as pointer to next set. GOOD for large amount of data
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
        // firstOrNew() 1:Checks if first param exists in DB. If not return NEW MODEL with fill() data if does not then RETURN THAT MATCHED OBJECT 
        // 2:Return the new instance of MODEL or one that matched first param.
        // 3:Not storing
        $post = Post::firstOrNew(
            [ // accepts array key-column name. value-data that you want to check if already exists
                'title' => $request->title,
            ],
            [ // accepts array key-column name. value-data you want to persist 
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
