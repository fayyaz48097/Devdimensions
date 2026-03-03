<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CaseStudyProject extends Model
{
    use SoftDeletes;

    protected $table = 'case_study_projects';

    protected $fillable = [
        'title',
        'slug',
        'categories',
        'image_path',
        'image_original_name',
        'description',
        'tools',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'categories' => 'array',
        'tools'      => 'array',
        'deleted_at' => 'datetime',
    ];

    // ── Scopes ──────────────────────────────────────────────────────

    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    // ── Helpers ─────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Resolved public URL for the project screenshot.
     * Paths starting with '/' or 'http' are treated as static assets.
     */
    public function imageUrl(): ?string
    {
        if (!$this->image_path) {
            return null;
        }

        if (
            str_starts_with($this->image_path, 'http') ||
            str_starts_with($this->image_path, '/')
        ) {
            return $this->image_path;
        }

        // Static seeded path — just a filename (no directory separator)
        if (!str_contains($this->image_path, '/')) {
            return asset('assets/images/' . $this->image_path);
        }

        return asset('storage/' . $this->image_path);
    }

    /**
     * Resolved public URLs for each tool image.
     * Handles both static seeded filenames and uploaded storage paths.
     *
     * @return array<string>
     */
    public function toolUrls(): array
    {
        if (!$this->tools) {
            return [];
        }

        return collect($this->tools)->map(function (string $tool): string {
            if (
                str_starts_with($tool, 'http') ||
                str_starts_with($tool, '/')
            ) {
                return $tool;
            }

            if (!str_contains($tool, '/')) {
                return asset('assets/images/' . $tool);
            }

            return asset('storage/' . $tool);
        })->all();
    }

    /**
     * Auto-generate a unique slug from title if none given.
     */
    public static function generateSlug(string $title, ?int $exceptId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i    = 1;

        while (
            static::where('slug', $slug)
            ->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))
            ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    /**
     * Fetch all published records for the public page, ordered by sort_order.
     */
    public static function live()
    {
        return static::published()->ordered()->get();
    }
}
