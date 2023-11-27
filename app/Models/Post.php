<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // CONNECTION PROPERTY will be set which connection with database will be used for this MODEL
    // Change the DB interacting with a particular MODEL
    protected $connection = 'sqlite'; // String name should be equal to the configuration file config/database.php                
}
