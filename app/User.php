<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use cebe\markdown\Markdown as Markdown;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'name', 
        'email', 
        'password',
        'sex',
        'birthplace',
        'birthday',
        'age',
        'height',
        'weight',
        'skill',
        'background',
        'influence',
        'hobby',
        'youtube',
        'twitter',
        'blog',
        'PR',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday'
    ];

    public function articles(): hasMany
    {
        return $this->hasMany('App\Article');
    }

    public function keeps(): BelongsToMany
    {
        return $this->BelongsToMany('App\Article', 'keeps')->withTimestamps();
    }

    public function follows(): BelongsToMany
    {
        return  $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->follows->where('id', $user->id)->count()
            : false;
    }

    public function getPrefNameAttribute() {
        return config('prefecture.'.$this->birthplace);
    }

    public function parse()
    {
        $parser = new Markdown();
        
        return $parser->parse($this->PR);
    }

    public function getMarkBodyAttribute() {
        return $this->parse();
    }

}







