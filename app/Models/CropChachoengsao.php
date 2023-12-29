<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropChachoengsao extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'latitude',
        'longitude',
        'class'
    ];

    public function spatialGroup()
    {
        return $this->belongsTo(SpatialGroup::class, 'group_id');
    }
}
