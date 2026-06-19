<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_name',
        'price',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
