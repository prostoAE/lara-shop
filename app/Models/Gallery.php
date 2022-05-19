<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Gallery extends Model {
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public static function addThumbnail($fields, $product_id) {
        if (!key_exists('product_thumbnail', $fields)) {
            return;
        }

        $current_image = $fields['product_thumbnail'];

        $image = new static;
        $image->product_id = $product_id;
        $image->uploadImage($current_image);
        $image->main_thumb = 1;
        $image->save();
    }

    public static function add($fields, $product_id) {
        if ($fields == null) {
            return;
        }

        if (is_array($fields) && count($fields) > 0) {

            foreach ($fields as $galleryImage) {
                $image = new static;
                $image->product_id = $product_id;
                $image->uploadImage($galleryImage);
                $image->main_thumb = 0;
                $image->save();
            }
        }
    }

    public function uploadImage($image) {
        if ($image == null) {
            return;
        }

        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = '/storage/uploads/' . $filename;
    }

    public function removeImage() {
        $arr = explode('/', $this->image);
        $filename = end($arr);

        if ($this->image != null) {
            Storage::delete('uploads/' . $filename);
        }
    }

}
