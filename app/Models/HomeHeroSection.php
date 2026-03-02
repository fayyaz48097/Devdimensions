<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeHeroSection extends Model
{
    use SoftDeletes;

    protected $table = 'home_hero_sections';

    protected $fillable = [
        'status',
        'heading_plain',
        'heading_gradient',
        'paragraph_text',
        'paragraph_highlight_1',
        'paragraph_highlight_2',
        'cta_label',
        'cta_url',
        'bg_image',
        'right_image_desktop',
        'right_image_mobile',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // ── Scopes ──

    /**
     * Only rows that are active and not soft-deleted.
     * Used by the public-facing hero section to decide whether to render.
     */
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
     * Resolve the stored path to a public URL.
     * Returns null when no image is stored so Blade can fall back to the
     * original static asset.
     */
    public function bgImageUrl(): ?string
    {
        return $this->bg_image ? asset('storage/' . $this->bg_image) : null;
    }

    public function rightImageDesktopUrl(): ?string
    {
        return $this->right_image_desktop ? asset('storage/' . $this->right_image_desktop) : null;
    }

    public function rightImageMobileUrl(): ?string
    {
        return $this->right_image_mobile ? asset('storage/' . $this->right_image_mobile) : null;
    }
}
