<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'description',
        'option_id',
    ];
    //uno a muchos inverso

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    //relacion muchos a muchos con variant
    public function variants()
    {
        return $this->belongsToMany(Variant::class)
            ->withTimestamps();
    }
}
