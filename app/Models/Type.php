<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
        'image'
    ];

    public function crops()
    {
        return $this->hasMany(Crop::class, 'id_type');
    }
}
