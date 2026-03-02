<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessSectionSetting extends Model
{
    protected $table    = 'process_section_settings';
    protected $fillable = ['heading', 'status'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /** Always return the one row; create with defaults if missing. */
    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'heading' => 'Our Approach',
            'status'  => 'active',
        ]);
    }
}
