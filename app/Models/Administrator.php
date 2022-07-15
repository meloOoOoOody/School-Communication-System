<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Administrator as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Administrator extends Authenticatable  implements JWTSubject
{

    protected $table = 'administrators';

    public $timestamps = true;

    protected $fillable = [
        'age', 'certification', 'user_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    

    ##############################Relationships##############################
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function class_group()
    {
        return $this->hasOne('Class_Group');
    }

}
