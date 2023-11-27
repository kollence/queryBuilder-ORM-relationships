<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // DEFAULT ATTRIBUTES will be set on every new model and it will have default key value pair passed to it.
    // Good when work with FORMS and API Requests
    // If user don`t provide any value for the attribute, then it will be set with default value.
    protected $attributes = [
        'user_id' => 1,
        'content' => 'Write something cool!',
        'is_published' => false,
        'min_to_read' => 0,
    ];                          
}
