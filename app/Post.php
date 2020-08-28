<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'user_id', 'category_id', 'title', 'slug', 'content', 'published_at',
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
      'updated_at', 'created_at',
  ];
}