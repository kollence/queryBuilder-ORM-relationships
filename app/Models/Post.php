<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // DEFAULT ATTRIBUTES will be set on every new model and it will have default key value pair passed to it.
    protected $attributes = [
        'user_id' => 1,
        'content' => 'Write something cool!',
        'is_published' => false,
        'min_to_read' => 0,
    ];
    // ON CREATION WILL DO THIS

    // 1. Create
        // Post::create([ 'slug'=> 'small-thing', 'title'=> 'Small Thing', 'excerpt'=>'izes mi patku']);
        
    // 2. Created with default attributes
        // user_id: 1,                        
        // content: "Write something cool!",  
        // is_published: false,               
        // min_to_read: 0,                    
        // slug: "small-thing",               
        // title: "Small Thing",              
        // excerpt: "izes mi patku",          
        // updated_at: "2023-11-27 17:00:11", 
        // created_at: "2023-11-27 17:00:11", 
        // id: 1110,                          

