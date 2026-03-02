<?php
// SAVE AS: app/Models/CtaSectionSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CtaSectionSetting extends Model
{
    protected $table    = 'cta_section_settings';
    protected $fillable = [
        'heading',
        'btn_primary_label',
        'btn_primary_url',
        'btn_secondary_label',
        'btn_secondary_url',
        'status',
    ];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'heading'             => 'Connect With The Top 3% Where Brilliance Ignites Extraordinary Achievements.',
            'btn_primary_label'   => 'Hire Engineers',
            'btn_primary_url'     => '/contact-us',
            'btn_secondary_label' => 'Develop With Us',
            'btn_secondary_url'   => '/contact-us',
            'status'              => 'active',
        ]);
    }
}
