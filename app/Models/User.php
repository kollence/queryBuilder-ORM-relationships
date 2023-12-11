<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Scopes\UserBalanceVerifiedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function contact(): HasOne
    {                                       // Optional: you can change foreign key 1:name or primary key 2:name
        return $this->hasOne(Contact::class /**  , 'user_id', 'id'  */);// Default
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class /** , 'user_id', 'id'  */);
    }

    public function companyOffice(): HasOneThrough
    {   // Direct association between 2 models through 3 intermediate Model
        return $this->hasOneThrough(
            Office::class, // the name of the final model we wish to access
            Company::class, // the name of the intermediate model.
            /**              // Optional: 
             * 'user_id',    // Foreign key on the companies table...
             * 'company_id', // Foreign key on the offices table...
             * 'id',         // Local key on the users table...
             * 'id'          // Local key on the companies table...
             */
        );
    }

    public function latestJob(): HasOne
    {              // hasOne relationship between User and Job model where user have many jobs but we only want LATEST one                                           
        return $this->hasOne(Job::class/** , 'user_id', 'id'  */)->latestOfMany();
                                                                // Latest Of Many sort `created_at` DESC return only first one 
    }

    public function oldestJob(): HasOne
    {              // hasOne relationship between User and Job model where user have many jobs but we only want OLDEST one                                           
        return $this->hasOne(Job::class/** , 'user_id', 'id'  */)->oldestOfMany();
                                                                // Oldest Of Many sort `created_at` ASC return only first one 
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
