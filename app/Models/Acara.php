<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
    protected $fillable = [
        'nama_acara',
        'deskripsi',
    ];
}
