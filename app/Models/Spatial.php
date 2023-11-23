<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spatial extends Model
{
    use HasFactory;

    protected $table = 'spatials';
    protected $primaryKey = 'sp_id';
    
    protected $fillable = ['group_id', 'name', 'url', 'attribute', 'description'];

    public function spatialGroup()
    {
        return $this->belongsTo(SpatialGroup::class, 'group_id');
    }
}
