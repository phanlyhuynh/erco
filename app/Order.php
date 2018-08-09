<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }

    public function detailOrders()
    {
        return $this->hasMany('App\DetailOrder');
    }

    public function scopeResult($query)
    {
        return $query->where('id', '>', 0);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'like', "%$value%");
    }

    public function scopeOrderById($query, $value)
    {
        return $query->orderBy('id', $value)->paginate(10);
    }
}
