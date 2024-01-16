<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    ];

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    // Soal.php

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


}
