<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FindTalentStep extends Model
{
    use SoftDeletes;

    protected $table = 'find_talent_steps';

    protected $fillable = [
        'sort_order',
        'icon_path',
        'icon_original_name',
        'title_plain',
        'title_bold',
        'bold_first',
        'tooltip_text',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'bold_first' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    // ── Scopes ──

    /** Active, non-deleted steps for the public blade. */
    public function scopePublished($query)
    {
        return $query->where('status', 'active');
    }

    // ── Helpers ──

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /** Resolved public URL for the uploaded icon. */
    public function iconUrl(): ?string
    {
        if (!$this->icon_path) {
            return null;
        }

        // Seeded rows may store a full asset() path — detect storage vs static
        if (str_starts_with($this->icon_path, 'http') || str_starts_with($this->icon_path, '/')) {
            return $this->icon_path;
        }

        return asset('storage/' . $this->icon_path);
    }

    /**
     * Returns the title as two lines ready for Blade rendering.
     * Line order depends on bold_first.
     *
     * Returns: ['first' => [...], 'second' => [...]]
     * Each line has: 'text' and 'bold' (bool)
     */
    public function titleLines(): array
    {
        if ($this->bold_first) {
            return [
                ['text' => $this->title_bold,  'bold' => true],
                ['text' => $this->title_plain, 'bold' => false],
            ];
        }

        return [
            ['text' => $this->title_plain, 'bold' => false],
            ['text' => $this->title_bold,  'bold' => true],
        ];
    }
}
