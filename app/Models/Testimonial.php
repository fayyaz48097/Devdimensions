<?php
// SAVE AS: app/Models/Testimonial.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;

    protected $table    = 'testimonials';
    protected $fillable = [
        'sort_order',
        'portrait_path',
        'portrait_original_name',
        'logo_path',
        'logo_original_name',
        'project_label',
        'quote',
        'author_name',
        'author_role',
        'status',
    ];
    protected $casts = ['sort_order' => 'integer'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function scopePublished($q)
    {
        return $q->where('status', 'active');
    }

    public function portraitUrl(): ?string
    {
        if (!$this->portrait_path) return null;
        if (str_starts_with($this->portrait_path, '/') || str_starts_with($this->portrait_path, 'http'))
            return $this->portrait_path;
        return asset('storage/' . $this->portrait_path);
    }

    public function logoUrl(): ?string
    {
        if (!$this->logo_path) return null;
        if (str_starts_with($this->logo_path, '/') || str_starts_with($this->logo_path, 'http'))
            return $this->logo_path;
        return asset('storage/' . $this->logo_path);
    }
}
