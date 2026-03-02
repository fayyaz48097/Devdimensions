<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioProject extends Model
{
    use SoftDeletes;

    protected $table = 'portfolio_projects';

    protected $fillable = [
        'sort_order',
        'title',
        'slug',
        'categories',
        'description',
        'img_desktop_path',
        'img_desktop_original_name',
        'img_mobile_path',
        'img_mobile_original_name',
        'project_url',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'categories' => 'array',
        'deleted_at' => 'datetime',
    ];

    // ── Scopes ──────────────────────────────────────────────────────────────

    /** Active, non-deleted projects for public blade. */
    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    // ── Helpers ─────────────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /** Resolved public URL for the desktop image. */
    public function desktopImageUrl(): ?string
    {
        return $this->resolveImageUrl($this->img_desktop_path);
    }

    /** Resolved public URL for the mobile image. */
    public function mobileImageUrl(): ?string
    {
        return $this->resolveImageUrl($this->img_mobile_path);
    }

    /**
     * Handles both seeded static asset paths (starting with / or http)
     * and uploaded storage paths.
     */
    private function resolveImageUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (str_starts_with($path, 'http') || str_starts_with($path, '/')) {
            return $path;
        }

        return asset('storage/' . $path);
    }

    /** Returns the categories as a comma-separated string for display. */
    public function categoriesLabel(): string
    {
        return implode(', ', $this->categories ?? []);
    }

    /**
     * Generates a URL-friendly slug from a title.
     * Used as a convenience when seeding or auto-populating.
     */
    public static function slugify(string $title): string
    {
        return \Illuminate\Support\Str::slug($title);
    }
}
