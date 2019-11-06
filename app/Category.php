<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
