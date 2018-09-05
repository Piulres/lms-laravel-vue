<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Trail
 *
 * @package App
 * @property string $title
*/
class Trail extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['title'];
    

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'categories' => 'array|nullable',
            'categories.*' => 'integer|exists:trailscategories,id|max:4294967295|nullable',
            'courses' => 'array|nullable',
            'courses.*' => 'integer|exists:courses,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'categories' => 'array|nullable',
            'categories.*' => 'integer|exists:trailscategories,id|max:4294967295|nullable',
            'courses' => 'array|nullable',
            'courses.*' => 'integer|exists:courses,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function categories()
    {
        return $this->belongsToMany(Trailscategory::class, 'trail_trailscategory')->withTrashed();
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_trail')->withTrashed();
    }
    
    
}
