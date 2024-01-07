<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Contactos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre_contacto',
        'apellido_contacto',
        'telefono_contacto',
        'slug'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // manipular el slug con base al campo message
    protected static function boot()
    {
        parent::boot();

        // crear el slug con base al campo message
        static::creating(function ($request) {
            $request->slug = Str::slug($request->nombre_contacto, '-', 'es');
        });

        // actualizar el slug con base al campo message
        static::updating(function ($request) {
            $request->slug = Str::slug($request->nombre_contacto, '-', 'es');
        });
    }

    // obter la uri de la ruta mediante slug y no por id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // mutadores y accesores
    public function message(): Attribute
    {
        return Attribute::make(
            get: fn ($nombre_contacto) => Str::lower($nombre_contacto),
            set: fn ($nombre_contacto) => Str::upper($nombre_contacto),
        );
    }
}
