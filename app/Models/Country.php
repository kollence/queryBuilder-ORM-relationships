<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function posts(): HasManyThrough
    {         // The "has-many-through" relationship provides a convenient way to access distant relations via an intermediate relation.
        return $this->hasManyThrough(
            Post::class, // the name of the final model we wish to access
            User::class, // the name of the intermediate model.
        /**              // Optional: 
         * 'user_id',    // Foreign key on posts table...
         * 'company_id', // Local key on users table...
         * 'id',         // Local key on the countries table...
         * 'id'          // Local key on the users table...
         */
        );
    }
}
