<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpatialGroup extends Model
{
    use HasFactory;

    protected $table = 'spatial__groups';
    protected $primaryKey = 'group_id';
    protected $fillable = ['regency_id', 'name', 'active'];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function spatials()
    {
        return $this->hasMany(Spatial::class, 'group_id');
    }

    public function scopeFilter($query, array $filter)
    {
        if (isset($filter['search']) ? $filter['search'] : false) {
            return $query->where('name', 'LIKE', '%' . request('search') . '%')
                ->orwhere('group_id', 'LIKE', '%' . request('search') . '%');
            ;
        }

        $query->when(($filter['search']) ?? false, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%')
                ->orwhere('group_id', 'LIKE', '%' . $search . '%');
        });
    }
}
