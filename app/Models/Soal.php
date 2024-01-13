<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }
    protected $casts = ['role' => 'array'];

    protected $fillable = [
        'acara_id',
        'pertanyaan',
        'jawaban',
        'role',
        // tambahkan field-form lainnya
    ];

}
