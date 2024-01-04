<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

    protected $table = 'waters';
    protected $primaryKey = 'water_id';
    protected $fillable = ['regency_id', 'lu_id', 'lc_id', 'group_id', 'name', 'latitude', 'longitude', 'altitude', 'address', 'wide', 'aoi', 'status_area', 'ownership', 'photo', 'permanence', 'description', 'related_photo'];

    protected $casts = [
        // 'lu_id' => 'array',
        'lu_id' => 'json',
    ];
    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function landUse()
    {
        return $this->hasMany(LandUse::class, 'lu_id');
    }

    public function landCover()
    {
        return $this->belongsTo(LandCover::class, 'lc_id');
    }

    public function spatialGroup()
    {
        return $this->belongsTo(SpatialGroup::class, 'group_id');
    }

    public function scopeFilter($query, array $filter)
    {
        if (isset($filter['search']) ? $filter['search'] : false) {
            return $query->where('name', 'LIKE', '%' . request('search') . '%')
                ->orwhere('description', 'LIKE', '%' . request('search') . '%');;
        }

        $query->when(($filter['search']) ??  false, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%')
                ->orwhere('description', 'LIKE', '%' . $search . '%');
        });
    }
}
