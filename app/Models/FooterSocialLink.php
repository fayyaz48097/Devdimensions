<?php

// SAVE AS: app/Models/FooterSocialLink.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterSocialLink extends Model
{
    use SoftDeletes;

    protected $table = 'footer_social_links';

    protected $fillable = [
        'platform',
        'url',
        'icon_key',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    // ── Scopes ──

    public function scopePublished($query)
    {
        return $query->where('status', 'active')->orderBy('sort_order');
    }

    // ── Helpers ──

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
