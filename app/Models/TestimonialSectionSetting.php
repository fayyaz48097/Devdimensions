<?php
// SAVE AS: app/Models/TestimonialSectionSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialSectionSetting extends Model
{
    protected $table    = 'testimonial_section_settings';
    protected $fillable = ['heading', 'status'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'heading' => "Don't Take Our Word for it",
            'status'  => 'active',
        ]);
    }
}
