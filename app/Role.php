<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
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