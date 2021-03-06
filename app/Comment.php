<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'post_id',
    'user_id',
    'content',
    'isDeleted',
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    'updated_at',
    'created_at',
  ];

  /**
   * Get post that owns the comment
   */
  public function post()
  {
    return $this->belongsTo('App\Post');
  }

  /**
   * Get user that owns the comment
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}