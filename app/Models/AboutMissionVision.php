<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutMissionVision extends Model
{
    use SoftDeletes;

    protected $table = 'about_mission_vision';

    protected $fillable = [
        'status',
        'mission_title',
        'mission_description',
        'vision_title',
        'vision_description',
        'mission_icon',
        'vision_icon',
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

    public function missionIconUrl(): ?string
    {
        return $this->mission_icon ? asset('storage/' . $this->mission_icon) : null;
    }

    public function visionIconUrl(): ?string
    {
        return $this->vision_icon ? asset('storage/' . $this->vision_icon) : null;
    }
}
