<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Datatrail
 *
 * @package App
 * @property string $trail
 * @property string $user
 * @property tinyInteger $view
 * @property integer $progress
 * @property integer $rating
*/
class Datatrail extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['view', 'progress', 'rating', 'trail_id', 'user_id'];
    

    public static function storeValidation($request)
    {
        return [
            'trail_id' => 'integer|exists:trails,id|max:4294967295|nullable',
            'user_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'view' => 'boolean|nullable',
            'progress' => 'integer|max:2147483647|nullable',
            'rating' => 'integer|max:2147483647|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'trail_id' => 'integer|exists:trails,id|max:4294967295|nullable',
            'user_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'view' => 'boolean|nullable',
            'progress' => 'integer|max:2147483647|nullable',
            'rating' => 'integer|max:2147483647|nullable'
        ];
    }

    

    
    
    public function trail()
    {
        return $this->belongsTo(Trail::class, 'trail_id')->withTrashed();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
}
