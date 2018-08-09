<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function images()
    {
        return $this->morphMany('App\Image', 'imagetable');
    }
    public function scopeSearch($query, $value)
    {
        return $query->where('title', 'like', "%$value%");
    }

    public function scopeOrderById($query, $value)
    {
        return $query->orderBy('id', $value)->get();
    }

    public function scopeResult($query)
    {
        return $query->where('id', '>', 0);
    }
}
