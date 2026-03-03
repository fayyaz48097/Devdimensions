<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutHeroSection extends Model
{
    use SoftDeletes;

    protected $table = 'about_hero_sections';

    protected $fillable = [
        'status',
        'heading_plain',
        'heading_gradient',
        'paragraph_text',
        'bg_image',
        'get_in_touch_image',
        'get_in_touch_url',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

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

    public function bgImageUrl(): ?string
    {
        return $this->bg_image ? asset('storage/' . $this->bg_image) : null;
    }

    public function getInTouchImageUrl(): ?string
    {
        return $this->get_in_touch_image ? asset('storage/' . $this->get_in_touch_image) : null;
    }
}
