<?php
// SAVE AS: app/Models/FaqItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqItem extends Model
{
    use SoftDeletes;

    protected $table    = 'faq_items';
    protected $fillable = ['sort_order', 'question', 'answer', 'status'];
    protected $casts    = ['sort_order' => 'integer'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function scopePublished($q)
    {
        return $q->where('status', 'active');
    }
}
