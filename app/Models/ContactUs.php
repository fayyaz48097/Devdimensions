<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [
        'full_name',
        'email',
        'company',
        'status',
        'technologies',
        'no_of_engineers',
        'type_of_hire',
        'quickly_hire',
        'description',
    ];

    protected $casts = [
        'technologies' => 'array',
    ];

    // ── Statuses ──────────────────────────────────────────────────────────────

    public static function statuses(): array
    {
        return ['pending', 'active', 'completed'];
    }

    // ── Scopes ────────────────────────────────────────────────────────────────

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }
}
