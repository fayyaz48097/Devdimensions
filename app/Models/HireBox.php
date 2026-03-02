<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HireBox extends Model
{
    use SoftDeletes;

    protected $table    = 'hire_boxes';
    protected $fillable = ['sort_order', 'image_path', 'image_original_name', 'title', 'description', 'box_url', 'status'];
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
