<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessStep extends Model
{
    use SoftDeletes;

    protected $table    = 'process_steps';
    protected $fillable = ['sort_order', 'icon_path', 'icon_original_name', 'title', 'description', 'status'];
    protected $casts    = ['sort_order' => 'integer'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function scopePublished($q)
    {
        return $q->where('status', 'active');
    }

    /** Resolve URL whether path is a seeded static asset or an uploaded file. */
    public function iconUrl(): ?string
    {
        if (!$this->icon_path) return null;
        if (str_starts_with($this->icon_path, '/') || str_starts_with($this->icon_path, 'http'))
            return $this->icon_path;
        return asset('storage/' . $this->icon_path);
    }
}
