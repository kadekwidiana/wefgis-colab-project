<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandUse extends Model
{
    use HasFactory;

    protected $table = 'land_uses';
    protected $primaryKey = 'lu_id';
    protected $fillable = ['landuse', 'icon'];

    public function waters()
    {
        return $this->hasMany(Water::class, 'lu_id');
    }
}
