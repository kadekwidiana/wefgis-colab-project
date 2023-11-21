<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_type',
        'label',
        'address',
        'latitude',
        'longitude',
        'description',
        'image',
        'plant_age',
        'valid',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
