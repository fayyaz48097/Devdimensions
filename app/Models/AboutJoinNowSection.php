<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutJoinNowSection extends Model
{
    use SoftDeletes;

    protected $table = 'about_join_now_sections';

    protected $fillable = [
        'logo_path',
        'logo_original_name',
        'logo_alt',
        'heading',
        'description',
        'cta_text',
        'cta_url',
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
     * Resolved public URL for the logo.
     * Paths starting with '/' or 'http' are static assets — returned as-is.
     * All other paths are resolved via the storage disk.
     */
    public function logoUrl(): ?string
    {
        if (!$this->logo_path) {
            return null;
        }

        if (
            str_starts_with($this->logo_path, 'http') ||
            str_starts_with($this->logo_path, '/')
        ) {
            return $this->logo_path;
        }

        return asset('storage/' . $this->logo_path);
    }

    /**
     * Fetch the single publishable record for the public page.
     * Returns null when no active, non-deleted record exists —
     * the blade hides the section automatically.
     */
    public static function live(): ?self
    {
        return static::published()->latest('updated_at')->first();
    }
}
