<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['seller_id', 'product_type', 'category', 'loading_point', 'stock_quantity', 'price_per_unit', 'product_info', 'product_image', 'status'];
}
