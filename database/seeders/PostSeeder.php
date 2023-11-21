<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $json = File::get("database/json/posts.json");
        // $decodeToArray = json_decode($json);
        // $posts = collect($decodeToArray);
        // dd($posts);



        Post::factory()->count(10)->create();
        // $posts = collect([
        //     [
        //         'title' => 'Post 1',
        //         'slug' => 'post-1',
        //         'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet nunc nec nibh efficitur interdum.',
        //         'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        //         'is_published' => 1,
        //         'min_to_read' => 3,
        //     ],
        //     [
        //         'title' => 'Post 2',
        //         'slug' => 'post-2',
        //         'content' => '222orem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet nunc nec nibh efficitur interdum.',
        //         'excerpt' => '222orem ipsum dolor sit amet, consectetur adipiscing elit...',
        //         'is_published' => 1,
        //         'min_to_read' => 3,
        //     ]
        // ]);

        // $posts->each(fn ($post) => Post::create(['user_id'=> $post->user_id, 'title'=>$post->title, 'slug'=>$post->slug, 'content'=>$post->content, 'excerpt'=>$post->excerpt, 'is_published'=>$post->is_published, 'min_to_read'=>$post->min_to_read]));

        // Post::create([
        //     'title' => 'Post 1',
        //     'slug' => 'post-1',
        //     'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet nunc nec nibh efficitur interdum.',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        //     'is_published' => 1,
        //     'min_to_read' => 3,
        // ]);

    }
}
