<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'regular_price',
        'sale_price',
        'quantity',
        'stock_status'
    ];

    protected $hidden = [
        'slug'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
