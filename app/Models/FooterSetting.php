<?php

// SAVE AS: app/Models/FooterSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterSetting extends Model
{
    use SoftDeletes;

    protected $table = 'footer_settings';

    protected $fillable = [
        'logo_path',
        'tagline',
        'copyright_text',
        'status',
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

    public function logoUrl(): string
    {
        return $this->logo_path
            ? asset('storage/' . $this->logo_path)
            : asset('assets/images/logo.svg');
    }

    /** Replaces {year} with the current 4-digit year. */
    public function parsedCopyright(): string
    {
        return str_replace('{year}', date('Y'), $this->copyright_text ?? '');
    }
}
