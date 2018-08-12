<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'introduction',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * Created by PhpStorm
     * author: sunshanshan
     * return: \Illuminate\Database\Eloquent\Relations\HasMany
     * Date: 2018/8/3 22:44
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    
    /**
     * 判断是否为原作者
     * Created by PhpStorm
     * @param \Illuminate\Database\Eloquent\Model $model
     * author: sunshanshan
     * return:
     * Date: 2018/8/12 12:18
     */
    public function isAuthor(\Illuminate\Database\Eloquent\Model $model)
    {
        return $this->id == $model->user_id;
    }
}
