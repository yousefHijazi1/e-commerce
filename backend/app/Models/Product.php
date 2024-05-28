<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_1',
        'image_2',
        'image_3',
        'quantity',
        'discount',
        'rate',
        'category'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    use HasFactory;
}
