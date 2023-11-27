<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // OVERWRITE  $table name that will refer to the table in the database
    protected $table = 'users'; // Post::all() return users
    protected $guarded = [];
    // CHANGE primary key of object model (if you want to use custom key for model)
    protected $primaryKey = 'email'; // Post::find("douglas.kilback@example.com") return single user with email douglas.kilback@example.com

    // INCREMENTING PROPERTY changing auto increment for the primary key. Default assumed it is `id`
    public $incrementing = false; // Tell Eloquent that the primary key is not auto-incrementing when new data is inserted to database

    // CHANGING the TYPE of the PRIMARY KEY
    protected $keyType = 'string'; // Tell Eloquent treat primary key as string and not as integer

    // DISABLE TIMESTAMPS
    // public $timestamps = false; // Tell Eloquent not to automatically manage `created_at` & `updated_at` fields

    // CHANGE DATE FORMAT default: Y-m-d H:i:s. Determines how date attributes are stored in the database
    protected $dateFormat = 'U'; // Tell Eloquent to use UNIX timestamp format-"1701101518"

}
