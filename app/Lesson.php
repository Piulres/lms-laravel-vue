<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Lesson
 *
 * @package App
 * @property string $title
 * @property text $introduction
 * @property text $content
*/
class Lesson extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['title', 'introduction', 'content'];
    protected $appends = ['study_material', 'study_material_link', 'uploaded_study_material'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'introduction' => 'max:65535|nullable',
            'study_material' => 'nullable',
            'study_material.*' => 'file|nullable',
            'content' => 'max:65535|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'introduction' => 'max:65535|nullable',
            'study_material' => 'sometimes',
            'study_material.*' => 'file|nullable',
            'content' => 'max:65535|nullable'
        ];
    }

    

    public function getStudyMaterialAttribute()
    {
        return [];
    }

    public function getUploadedStudyMaterialAttribute()
    {
        return $this->getMedia('study_material')->keyBy('id');
    }

    /**
     * @return string
     */
    public function getStudyMaterialLinkAttribute()
    {
        $study_material = $this->getMedia('study_material');
        if (! count($study_material)) {
            return null;
        }
        $html = [];
        foreach ($study_material as $file) {
            $html[] = '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
        }

        return implode('<br/>', $html);
    }
    
    
}
