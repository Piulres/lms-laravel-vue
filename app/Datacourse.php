<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Datacourse
 *
 * @package App
 * @property string $course
 * @property string $user
 * @property tinyInteger $view
 * @property integer $progress
 * @property integer $rating
*/
class Datacourse extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['view', 'progress', 'rating', 'course_id', 'user_id'];
    

    public static function storeValidation($request)
    {
        return [
            'course_id' => 'integer|exists:courses,id|max:4294967295|nullable',
            'user_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'view' => 'boolean|nullable',
            'progress' => 'integer|max:2147483647|nullable',
            'rating' => 'integer|max:2147483647|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'course_id' => 'integer|exists:courses,id|max:4294967295|nullable',
            'user_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'view' => 'boolean|nullable',
            'progress' => 'integer|max:2147483647|nullable',
            'rating' => 'integer|max:2147483647|nullable'
        ];
    }

    

    
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
}
