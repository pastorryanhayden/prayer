<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// use Laravel\Scout\Searchable;

class Church extends Model
{
    // use Searchable;
    protected $guarded = [];
    protected $connection = 'userbase';

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function settings()
    {
        return $this->hasOne(Setting::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
}
