<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'name',
        'email',
        'phone',
        'city',
        'address',
        'cost'

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
