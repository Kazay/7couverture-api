<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
  use Authenticatable, Authorizable;

  /**
   * The attributes that are mass assignable.
    *
   * @var array
   */
  protected $fillable = [
    'id',
    'role_id',
    'username',
    'firstname',
    'lastname',
    'email',
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'updated_at',
    'created_at',
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

  /**
   * Get role that owns the user
   */
  public function role()
  {
    return $this->belongsTo('App\Role');
  }

  /**
   * Get comments associated with the user
   */
  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

    /**
   * Get posts associated with the user
   */
  public function posts()
  {
    return $this->hasMany('App\Post');
  }
}
