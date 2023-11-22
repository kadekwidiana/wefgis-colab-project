<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

    protected $table = 'waters';
    protected $primaryKey = 'water_id';
    protected $fillable = ['regency_id', 'lu_id', 'lc_id', 'name', 'latitude', 'longitude', 'altitude', 'address', 'wide', 'aoi', 'status_area', 'ownership', 'photo', 'permanence', 'description', 'related_photo'];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function landUse()
    {
        return $this->belongsTo(LandUse::class, 'lu_id');
    }

    public function landCover()
    {
        return $this->belongsTo(LandCover::class, 'lc_id');
    }
}
