<?php
// SAVE AS: app/Models/PartnerSectionSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSectionSetting extends Model
{
    protected $table    = 'partner_section_settings';
    protected $fillable = ['heading', 'status'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'heading' => 'Our Partners',
            'status'  => 'active',
        ]);
    }
}
