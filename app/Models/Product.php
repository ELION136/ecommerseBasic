<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use hasFactory;


    protected $fillable = [
        
        'sku',
        'name',
        'description',
        'image_path',
        'price',
        'subcategory_id',

        
    ];
    //relacion uno a muchos inverse
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //relacion uno a muchos con variant
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    //relacion muchos a muchos con option
    public function options()
    {
        return $this->belongsToMany(Option::class)
            ->withPivot('value')
            ->withTimestamps();
    }
}
