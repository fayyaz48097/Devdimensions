<?php

// SAVE AS: app/Models/FooterOffice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterOffice extends Model
{
    use SoftDeletes;

    protected $table = 'footer_offices';

    protected $fillable = [
        'country',
        'flag_path',
        'address',
        'phone',
        'email',
        'address_url',
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

    public function flagUrl(): ?string
    {
        return $this->flag_path
            ? asset('storage/' . $this->flag_path)
            : null;
    }

    public function phoneHref(): ?string
    {
        if (!$this->phone) return null;
        return 'tel:' . preg_replace('/[^+\d]/', '', $this->phone);
    }
}
