<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
{                                           // Optional: you can change foreign key 1:name or primary key 2:name
        return $this->belongsTo(User::class /**  , 'user_id', 'id'  */);// Default
    }

}
