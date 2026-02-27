<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'message',
        'status',
    ];

    /**
     * Status constants.
     */
    const STATUS_PENDING   = 'pending';
    const STATUS_ACTIVE    = 'active';
    const STATUS_COMPLETED = 'completed';

    /**
     * All valid statuses.
     */
    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_ACTIVE,
            self::STATUS_COMPLETED,
        ];
    }

    /**
     * Human-readable label map for statuses.
     */
    public static function statusLabels(): array
    {
        return [
            self::STATUS_PENDING   => 'Pending',
            self::STATUS_ACTIVE    => 'Active',
            self::STATUS_COMPLETED => 'Completed',
        ];
    }

    /**
     * Scope: only pending consultations.
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope: only active consultations.
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Scope: only completed consultations.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    /**
     * CSS pill colour class for blade views.
     */
    public function getStatusClassAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_ACTIVE    => 'pill-active',
            self::STATUS_COMPLETED => 'pill-completed',
            default                => 'pill-pending',
        };
    }
}
