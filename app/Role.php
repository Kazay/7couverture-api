<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  const ADMIN = 1;
  const PUBLISHER = 2;
  const USER = 3;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'name',
  ];

  /**
   * Get users associated with the role
   */
  public function users()
  {
    return $this->hasMany('App\User');
  }
}