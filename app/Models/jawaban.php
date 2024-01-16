<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'soal_id',
        'jawaban',
    ];
    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }
}
