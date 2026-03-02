<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HireSectionSetting extends Model
{
    protected $table    = 'hire_section_settings';
    protected $fillable = ['status', 'heading', 'subheading', 'checklist_items', 'cta_label', 'cta_url'];
    protected $casts    = ['checklist_items' => 'array'];

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'status'          => 'active',
            'heading'         => "We're the Utility Player",
            'subheading'      => "Whether you need niche expertise or an entire project force, we'll work directly with you to bring your project to life helping cover any skill gaps along the way.",
            'checklist_items' => ['Hire Individual Resource', 'Hire Multiple Resources', 'Hire Entire Team or Department'],
            'cta_label'       => 'Get Free Consultation',
            'cta_url'         => '/contact-us',
        ]);
    }
}