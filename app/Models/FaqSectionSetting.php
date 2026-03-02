<?php
// SAVE AS: app/Models/FaqSectionSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqSectionSetting extends Model
{
    protected $table    = 'faq_section_settings';
    protected $fillable = ['heading', 'subheading', 'status'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'heading'    => 'Frequently Asked Questions',
            'subheading' => 'We value long-term partnerships, and we bet you do too.',
            'status'     => 'active',
        ]);
    }
}
