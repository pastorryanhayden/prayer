<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
