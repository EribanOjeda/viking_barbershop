<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'telefono', 'user_id'];

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
