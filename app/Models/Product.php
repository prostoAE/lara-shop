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

    public function images() {
        return $this->hasMany(Gallery::class);
    }

    public function edit($fields) {
        $this->fill($fields);
        $this->save();

        foreach ($this->images as $image) {
            $image->removeImage();
            $image->deleteOrFail();
        }

        Gallery::addThumbnail($fields, $this->id);
        foreach ($fields as $File) {
            Gallery::add($File, $this->id);
        }
    }
}
