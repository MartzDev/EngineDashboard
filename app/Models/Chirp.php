<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chirp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'message',
    ];

    public function getRouteKeyName(): string
    {
        return "slug";
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
