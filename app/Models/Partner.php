<?php
// SAVE AS: app/Models/Partner.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;

    protected $table    = 'partners';
    protected $fillable = ['sort_order', 'image_path', 'image_original_name', 'alt_text', 'link_url', 'status'];
    protected $casts    = ['sort_order' => 'integer'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function scopePublished($q)
    {
        return $q->where('status', 'active');
    }

    public function imageUrl(): ?string
    {
        if (!$this->image_path) return null;
        if (str_starts_with($this->image_path, '/') || str_starts_with($this->image_path, 'http'))
            return $this->image_path;
        return asset('storage/' . $this->image_path);
    }
}
