<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected $table = 'regencies';
    protected $primaryKey = 'regency_id';
    protected $fillable = ['regency', 'province', 'center_coor'];

    public function spatialGroups()
    {
        return $this->hasMany(SpatialGroup::class, 'regency_id');
    }

    public function waters()
    {
        return $this->hasMany(Water::class, 'regency_id');
    }
}
