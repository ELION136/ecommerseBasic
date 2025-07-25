<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use hasFactory;


    protected $fillable = [
        'name',
        'family_id',
    ];
    //relacion uno a muchos invera
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    //relacion uno a muchos 
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
