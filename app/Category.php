<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'name',
    'description',
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
   * Get posts associated with the category
   */
  public function posts()
  {
    return $this->hasMany('App\Post');
  }
}