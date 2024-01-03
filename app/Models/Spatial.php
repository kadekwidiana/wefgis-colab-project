<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spatial extends Model
{
    use HasFactory;

    protected $table = 'spatials';
    protected $primaryKey = 'sp_id';
    
    protected $fillable = ['group_id', 'title', 'name', 'url', 'attribute', 'description'];

    public function spatialGroup()
    {
        return $this->belongsTo(SpatialGroup::class, 'group_id');
    }


    public function scopeFilter($query, array $filter)
    {
        if (isset($filter['search']) ? $filter['search'] : false) {
            return $query->where('name', 'LIKE', '%' . request('search') . '%')
                ->orwhere('description', 'LIKE', '%' . request('search') . '%');
            ;
        }

        $query->when(($filter['search']) ?? false, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%')
                ->orwhere('description', 'LIKE', '%' . $search . '%');
        });
    }
}
