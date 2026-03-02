<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class WelcomeSectionSliderLine extends Model
{
    use SoftDeletes;

    protected $table = 'welcome_section_slider_lines';

    protected $fillable = [
        'welcome_section_id',
        'sort_order',
        'prefix_text',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'deleted_at' => 'datetime',
    ];

    // ── Relationships ──

    public function welcomeSection(): BelongsTo
    {
        return $this->belongsTo(WelcomeSection::class, 'welcome_section_id');
    }

    /** All items (including inactive/trashed) — for admin. */
    public function items(): HasMany
    {
        return $this->hasMany(WelcomeSectionSliderItem::class, 'slider_line_id')
            ->orderBy('sort_order');
    }

    /** Only active, non-deleted items — for public blade. */
    public function activeItems(): HasMany
    {
        return $this->hasMany(WelcomeSectionSliderItem::class, 'slider_line_id')
            ->where('status', 'active')
            ->orderBy('sort_order');
    }

    // ── Scopes ──

    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    // ── Helpers ──

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
