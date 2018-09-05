<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string $website
 * @property string $avatar
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait, HasApiTokens;

    
    protected $fillable = ['name', 'last_name', 'email', 'website', 'password', 'remember_token'];
    protected $hidden = ['password', 'remember_token'];
    protected $appends = ['avatar', 'avatar_link'];
    protected $with = ['media'];

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'last_name' => 'max:191|nullable',
            'email' => 'email|max:191|required|unique:users,email',
            'website' => 'max:191|nullable',
            'avatar' => 'file|image|nullable',
            'password' => 'required',
            'role' => 'array|required',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'last_name' => 'max:191|nullable',
            'email' => 'email|max:191|required|unique:users,email,'.$request->route('user'),
            'website' => 'max:191|nullable',
            'avatar' => 'nullable',
            'password' => '',
            'role' => 'array|required',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable'
        ];
    }

    
    
    
    public function getAvatarAttribute()
    {
        return $this->getFirstMedia('avatar');
    }

    /**
     * @return string
     */
    public function getAvatarLinkAttribute()
    {
        $file = $this->getFirstMedia('avatar');
        if (! $file) {
            return null;
        }

        return '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    
    
    

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
}
