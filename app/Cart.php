<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;
    protected $table = 'carts';
    protected $fillable = [
        'soluong',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
