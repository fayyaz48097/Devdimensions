<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutCoreValueSection extends Model
{
    use SoftDeletes;

    protected $table = 'about_core_value_sections';

    protected $fillable = [
        'title',
        'diagram_image_path',
        'diagram_image_original_name',
        'diagram_image_alt',
        'status',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // ── Scopes ──────────────────────────────────────────────────────

    /** Active, non-deleted record — for public pages. */
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
     * Resolved public URL for the diagram image.
     * Seeded paths start with '/' (static public asset) — returned as-is.
     * Uploaded paths are resolved via the storage disk.
     */
    public function diagramImageUrl(): ?string
    {
        if (!$this->diagram_image_path) {
            return null;
        }

        if (
            str_starts_with($this->diagram_image_path, 'http') ||
            str_starts_with($this->diagram_image_path, '/')
        ) {
            return $this->diagram_image_path;
        }

        return asset('storage/' . $this->diagram_image_path);
    }

    /**
     * Fetch the single publishable record.
     * Returns null if no active, non-deleted record exists —
     * the blade hides the section in that case.
     */
    public static function live(): ?self
    {
        return static::published()->latest('updated_at')->first();
    }
}
