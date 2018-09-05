<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Course
 *
 * @package App
 * @property string $title
 * @property string $featured_image
 * @property string $description
 * @property text $introduction
 * @property integer $duration
*/
class Course extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['title', 'description', 'introduction', 'duration'];
    protected $appends = ['featured_image', 'featured_image_link'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'instructor' => 'array|nullable',
            'instructor.*' => 'integer|exists:users,id|max:4294967295|nullable',
            'lessons' => 'array|nullable',
            'lessons.*' => 'integer|exists:lessons,id|max:4294967295|nullable',
            'categories' => 'array|nullable',
            'categories.*' => 'integer|exists:coursescategories,id|max:4294967295|nullable',
            'featured_image' => 'file|image|nullable',
            'description' => 'max:191|nullable',
            'introduction' => 'max:65535|nullable',
            'duration' => 'integer|max:2147483647|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'instructor' => 'array|nullable',
            'instructor.*' => 'integer|exists:users,id|max:4294967295|nullable',
            'lessons' => 'array|nullable',
            'lessons.*' => 'integer|exists:lessons,id|max:4294967295|nullable',
            'categories' => 'array|nullable',
            'categories.*' => 'integer|exists:coursescategories,id|max:4294967295|nullable',
            'featured_image' => 'nullable',
            'description' => 'max:191|nullable',
            'introduction' => 'max:65535|nullable',
            'duration' => 'integer|max:2147483647|nullable'
        ];
    }

    

    public function getFeaturedImageAttribute()
    {
        return $this->getFirstMedia('featured_image');
    }

    /**
     * @return string
     */
    public function getFeaturedImageLinkAttribute()
    {
        $file = $this->getFirstMedia('featured_image');
        if (! $file) {
            return null;
        }

        return '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
    }
    
    public function instructor()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }
    
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'course_lesson')->withTrashed();
    }
    
    public function categories()
    {
        return $this->belongsToMany(Coursescategory::class, 'course_coursescategory')->withTrashed();
    }
    
    
}
