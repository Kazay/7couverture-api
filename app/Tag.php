<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    'updated_at',
    'created_at',
  ];

  /**
   * Get posts associated with the tag
   */
  public function post()
  {
    return $this->belongsToMany('App\Post');
  }
}