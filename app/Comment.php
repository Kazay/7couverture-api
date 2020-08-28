<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'post_id', 'user_id', 'content',
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