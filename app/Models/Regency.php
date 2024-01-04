<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected $table = 'regencies';
    protected $primaryKey = 'regency_id';
    protected $fillable = ['regency', 'province'];

    public function spatialGroups()
    {
        return $this->hasMany(SpatialGroup::class, 'regency_id');
    }

    public function waters()
    {
        return $this->hasMany(Water::class, 'regency_id');
    }

    public function scopeFilter($query, array $filter)
    {
        if (isset($filter['search']) ? $filter['search'] : false) {
            return $query->where('regency', 'LIKE', '%' . request('search') . '%')
                ->orwhere('province', 'LIKE', '%' . request('search') . '%');
            ;
        }

        $query->when(($filter['search']) ?? false, function ($query, $search) {
            return $query->where('regency', 'LIKE', '%' . $search . '%')
                ->orwhere('province', 'LIKE', '%' . $search . '%');
        });
    }

}
