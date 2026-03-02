<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarqueeItem extends Model
{
    use SoftDeletes;

    protected $table = 'marquee_items';

    protected $fillable = [
        'row',
        'label',
        'icon_path',
        'icon_original_name',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'row'        => 'integer',
        'sort_order' => 'integer',
        'deleted_at' => 'datetime',
    ];

    // ── Scopes ──

    /** Only active, non-deleted items — used by the public blade. */
    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    /** Items for a specific row. */
    public function scopeForRow($query, int $row)
    {
        return $query->where('row', $row);
    }

    // ── Helpers ──

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Returns the public URL for the uploaded icon.
     * Falls back to null when no icon is stored so the blade can skip the tag.
     */
    public function iconUrl(): ?string
    {
        return $this->icon_path ? asset('storage/' . $this->icon_path) : null;
    }
}
