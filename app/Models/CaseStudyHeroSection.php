<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudyHeroSection extends Model
{
    use SoftDeletes;

    protected $table = 'case_study_hero_sections';

    protected $fillable = [
        'heading',
        'heading_highlight',
        'description',
        'bg_image_path',
        'bg_image_original_name',
        'status',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // ── Scopes ──────────────────────────────────────────────────────

    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    // ── Helpers ─────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Resolved public URL for the background image.
     * Falls back to the static default when no upload exists.
     */
    public function bgImageUrl(): string
    {
        if (!$this->bg_image_path) {
            return asset('assets/images/home-hero-1.png');
        }

        if (
            str_starts_with($this->bg_image_path, 'http') ||
            str_starts_with($this->bg_image_path, '/')
        ) {
            return $this->bg_image_path;
        }

        return asset('storage/' . $this->bg_image_path);
    }

    /**
     * Fetch the single publishable record for the public page.
     */
    public static function live(): ?self
    {
        return static::published()->latest('updated_at')->first();
    }
}
