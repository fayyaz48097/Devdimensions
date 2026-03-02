<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class WelcomeSection extends Model
{
    use SoftDeletes;

    protected $table = 'welcome_sections';

    protected $fillable = [
        'heading',
        'description',
        'cta_text',
        'cta_url',
        'hero_image_path',
        'hero_image_original_name',
        'hero_image_alt',
        'status',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // ── Relationships ──

    /** All slider lines (including inactive / trashed — for admin). */
    public function sliderLines(): HasMany
    {
        return $this->hasMany(WelcomeSectionSliderLine::class, 'welcome_section_id')
            ->orderBy('sort_order');
    }

    /** Only active, non-deleted slider lines with their active items — for public blade. */
    public function activeSliderLines(): HasMany
    {
        return $this->hasMany(WelcomeSectionSliderLine::class, 'welcome_section_id')
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->with(['activeItems']);
    }

    // ── Scopes ──

    /** Active, non-deleted record for the public homepage. */
    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    // ── Helpers ──

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Resolved public URL for the hero image.
     * Seeded rows start with '/' (static asset path).
     * Uploaded rows use the storage disk.
     */
    public function heroImageUrl(): ?string
    {
        if (!$this->hero_image_path) {
            return null;
        }

        if (
            str_starts_with($this->hero_image_path, 'http') ||
            str_starts_with($this->hero_image_path, '/')
        ) {
            return $this->hero_image_path;
        }

        return asset('storage/' . $this->hero_image_path);
    }

    /**
     * Fetch the single active section with all its active slider lines and items.
     * Returns null if no publishable record exists — the blade hides the section.
     */
    public static function live(): ?self
    {
        return static::published()
            ->with(['activeSliderLines'])
            ->latest('updated_at')
            ->first();
    }
}
