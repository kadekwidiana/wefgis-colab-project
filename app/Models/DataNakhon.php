<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNakhon extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'latitude',
        'longitude',
        'no_village',
        'subdistrict',
        'district',
        'district',
        'project_code',
        'owner',
        'number',
        'distance',
        'picture',
        'yes',
        'no',
    ];

    public function projectCode()
    {
        return $this->belongsTo(ProjectCode::class, 'project_code', 'project_code');
    }


}
