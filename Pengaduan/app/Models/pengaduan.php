<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pengaduan extends Model
{
    protected $guarded = [

    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori_pengaduan::class, 'kategori_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
