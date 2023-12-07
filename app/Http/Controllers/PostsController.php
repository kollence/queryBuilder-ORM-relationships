<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {   // EAGER LOADING is technique to load related data up front (instead of lazy loading)
        // By using with() method we will load related tags for each post
        // DB::enableQueryLog(); // WATCH HOW QUERY IS BUILT
        // $posts = Post::with('tags')->get(); // 1:Eager Loading will load related relationship defined in Model.
                                            // With each Post in collection will come related tags too by using with() method
        // EXAMPLE 1: QUERY
        // dd(DB::getQueryLog());// "query" => "select * from `posts` where `posts`.`deleted_at` is null"
                                // "query" => "select `tags`.*, `post_tag`.`post_id` as `pivot_post_id`, `post_tag`.`tag_id` as `pivot_tag_id` from `tags` inner join `post_tag` on `tags`.`id` = `post_tag`.`tag_id` where `post_tag`.`post_id` in (100, 101, 102, 103, 104, 105, 107, 109, 111)
        // dd($posts); // Post #relations: ['tags']
        // $posts = Post::all(); // 2:Lazy Loading DO NOT load relationships data in front. You need to make additionally QUERY to load relationship data.
        // EXAMPLE 2: QUERY 
        // dd(DB::getQueryLog());// "query" => "select * from `posts` where `posts`.`deleted_at` is null"
        // dd($posts); // Post #relations: []
        $tags = Tag::all();
        $posts = Post::with('tags')->orderBy('id', 'desc')->cursorPaginate(5);
        return view('posts.index', ['posts' => $posts, 'tags' => $tags]);
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

        // dd($post);// return new Model with filled data or matched object
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
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
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', ['post' => $post, 'tags'=>$tags]);
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
        $replicatedWithUnique = $post->replicate()->fill(['title' => 'Unique on DB lvl', 'slug' => 'unique-on-db-as-well']); // Use fill() to overwrite replicated data 
        // (example: title, slug are unique. CAN`T BE SAME)

        dd($replicatedWithUnique); // will return new fresh instance of model post with filled data
        // $replicatedWithUnique->save(); // if you need to save replicated instance
    }

    public function detachTag(Request $request, Post $post)
    {
        // dd($request->detach_tag);
        $post->tags()->detach($request->detach_tag);
        return redirect()->back();
    }

    public function attachTag(Request $request, Post $post)
    {
        // dd($request->attach_tag);
        $post->tags()->attach($request->attach_tag);
        return redirect()->back();
    }

    public function updateExistingTag(Request $request, Post $post)
    {
        // dd($request->attach_tag);
        $post->tags()->updateExistingPivot($request->current_tag_value, ['tag_id' => $request->updating_tag_value]);
        return redirect()->back();
    }
}
