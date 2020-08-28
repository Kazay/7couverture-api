<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, AuthorizableContract
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
    'nickname',
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
