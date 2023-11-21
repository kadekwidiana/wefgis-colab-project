<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_code',
        'icon',
    ];

    public function dataNakhon()
    {
        return $this->belongsTo(DataNakhon::class, 'project_code', 'project_code');
    }
}
