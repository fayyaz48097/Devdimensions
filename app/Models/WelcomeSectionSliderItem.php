<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WelcomeSectionSliderItem extends Model
{
    use SoftDeletes;

    protected $table = 'welcome_section_slider_items';

    protected $fillable = [
        'slider_line_id',
        'sort_order',
        'item_text',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'deleted_at' => 'datetime',
    ];

    // ── Relationships ──

    public function sliderLine(): BelongsTo
    {
        return $this->belongsTo(WelcomeSectionSliderLine::class, 'slider_line_id');
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
