<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role', 'acara_id'];

    public function soal(): HasMany
    {
        return $this->hasMany(Soal::class);
    }



    public function soals()
    {
        return $this->belongsToMany(Soal::class);
    }

}


