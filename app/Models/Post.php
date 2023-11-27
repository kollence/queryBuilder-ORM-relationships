<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // OVERWRITE  $table name that will refer to the table in the database
    protected $table = 'users'; // Post::all() return users
}
