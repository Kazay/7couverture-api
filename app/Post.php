<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'user_id', 
    'category_id',
    'title',
    'slug',
    'content',
    'published_at',
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
   * Get user that owns the post
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * Get category that owns the post
   */
  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  /**
   * Get comments associated with the post
    */
  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  /**
   * Get tags associated with the post
   */
  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }
}