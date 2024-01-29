<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $fillable = ['acara_id', 'jawaban', 'nama', 'email', 'role_id'];
    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


}
