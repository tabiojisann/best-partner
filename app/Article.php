<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{

    protected $fillable = [
        'title',
        'text',
        'position',
        'style',
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
      
    

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function keeps(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'keeps')->withTimestamps();    
    }

    public function isKeep(?User $user): bool
    {
        return $user
        ? (bool)$this->keeps->where('id', $user->id)->count()
        : false;
    }

    public function getCountKeepsAttribute(): int
    {
        return $this->keeps->count();
    }

    

}

