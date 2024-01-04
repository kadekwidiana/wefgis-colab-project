<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandCover extends Model
{
    use HasFactory;

    protected $table = 'land_covers';
    protected $primaryKey = 'lc_id';
    protected $fillable = ['type', 'landcover', 'icon'];

    public function waters()
    {
        return $this->hasMany(Water::class, 'lc_id');
    }


    public function scopeFilter($query, array $filter)
    {
        if (isset($filter['search']) ? $filter['search'] : false) {
            return $query->where('type', 'LIKE', '%' . request('search') . '%')
                ->orwhere('landcover', 'LIKE', '%' . request('search') . '%');
            ;
        }

        $query->when(($filter['search']) ?? false, function ($query, $search) {
            return $query->where('type', 'LIKE', '%' . $search . '%')
                ->orwhere('landcover', 'LIKE', '%' . $search . '%');
        });
    }

}
