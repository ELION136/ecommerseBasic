<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use hasFactory;

    protected $fillable = [
        
        'sku',
        'image_path',
        'product_id',
    ];
    //relacion uno a muchos inverso 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //relacion de muchos a muchos con feature
    public function features()
    {
        return $this->belongsToMany(Feature::class)
            ->withTimestamps();
    }
}
