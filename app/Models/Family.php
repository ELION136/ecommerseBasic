<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use hasFactory;
    protected $table = 'families';
    protected $primaryKey = 'id'; // Aseguramos el campo primario
    protected $fillable = ['name'];

    //relacion uno a muchos 
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
