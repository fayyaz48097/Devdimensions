<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterOffice;
use App\Models\FooterSetting;
use App\Models\FooterSocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    // ─────────────────────────────────────────────────────────
    //  INDEX
    // ─────────────────────────────────────────────────────────
    public function index()
    {
        $setting = FooterSetting::withTrashed()->latest()->first();

        $socials = FooterSocialLink::withTrashed()
            ->orderBy('sort_order')
            ->get();

        $offices = FooterOffice::withTrashed()
            ->orderBy('sort_order')
            ->get();

        return view('pages.admin.footer.index', compact('setting', 'socials', 'offices'));
    }

    // ─────────────────────────────────────────────────────────
    //  SETTINGS — store (first time)
    // ─────────────────────────────────────────────────────────
    public function storeSettings(Request $request)
    {
        $data = $this->validateSettings($request);
        $data = $this->handleLogo($request, $data);

        FooterSetting::create($data);

        return back()->with('success', 'Footer settings created.');
    }

    // ─────────────────────────────────────────────────────────
    //  SETTINGS — update
    // ─────────────────────────────────────────────────────────
    public function updateSettings(Request $request, FooterSetting $footerSetting)
    {
        $data = $this->validateSettings($request);
        $data = $this->handleLogo($request, $data, $footerSetting);

        $footerSetting->update($data);

        return back()->with('success', 'Footer settings saved.');
    }

    // ─────────────────────────────────────────────────────────
    //  SETTINGS — toggle status
    // ─────────────────────────────────────────────────────────
    public function toggleStatus(FooterSetting $footerSetting)
    {
        $footerSetting->update([
            'status' => $footerSetting->status === 'active' ? 'inactive' : 'active',
        ]);
        return back()->with('success', 'Footer set to ' . ucfirst($footerSetting->status) . '.');
    }

    // ─────────────────────────────────────────────────────────
    //  SETTINGS — soft delete / restore
    // ─────────────────────────────────────────────────────────
    public function destroySettings(FooterSetting $footerSetting)
    {
        $footerSetting->delete();
        return back()->with('success', 'Footer deleted (can be restored).');
    }

    public function restoreSettings(int $id)
    {
        FooterSetting::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Footer restored.');
    }

    // ─────────────────────────────────────────────────────────
    //  SOCIAL LINKS — store
    // ─────────────────────────────────────────────────────────
    public function storeSocial(Request $request)
    {
        $data = $this->validateSocial($request);
        $data['sort_order'] = (FooterSocialLink::withTrashed()->max('sort_order') ?? 0) + 1;

        FooterSocialLink::create($data);

        return back()->with('success', "{$data['platform']} social link added.");
    }

    // ─────────────────────────────────────────────────────────
    //  SOCIAL LINKS — update
    // ─────────────────────────────────────────────────────────
    public function updateSocial(Request $request, FooterSocialLink $footerSocialLink)
    {
        $footerSocialLink->update($this->validateSocial($request));
        return back()->with('success', "{$footerSocialLink->platform} updated.");
    }

    // ─────────────────────────────────────────────────────────
    //  SOCIAL LINKS — toggle / delete / restore / sort
    // ─────────────────────────────────────────────────────────
    public function toggleSocial(FooterSocialLink $footerSocialLink)
    {
        $footerSocialLink->update([
            'status' => $footerSocialLink->status === 'active' ? 'inactive' : 'active',
        ]);
        return back()->with('success', "{$footerSocialLink->platform} set to " . ucfirst($footerSocialLink->status) . '.');
    }

    public function destroySocial(FooterSocialLink $footerSocialLink)
    {
        $label = $footerSocialLink->platform;
        $footerSocialLink->delete();
        return back()->with('success', "{$label} deleted.");
    }

    public function restoreSocial(int $id)
    {
        $link = FooterSocialLink::withTrashed()->findOrFail($id);
        $link->restore();
        return back()->with('success', "{$link->platform} restored.");
    }

    public function sortSocials(Request $request)
    {
        $request->validate(['items' => 'required|array', 'items.*' => 'integer']);
        foreach ($request->items as $order => $id) {
            FooterSocialLink::where('id', $id)->update(['sort_order' => $order]);
        }
        return response()->json(['ok' => true]);
    }

    // ─────────────────────────────────────────────────────────
    //  OFFICES — store
    // ─────────────────────────────────────────────────────────
    public function storeOffice(Request $request)
    {
        $data = $this->validateOffice($request);
        $data = $this->handleFlag($request, $data);
        $data['sort_order'] = (FooterOffice::withTrashed()->max('sort_order') ?? 0) + 1;

        FooterOffice::create($data);

        return back()->with('success', "{$data['country']} office added.");
    }

    // ─────────────────────────────────────────────────────────
    //  OFFICES — update
    // ─────────────────────────────────────────────────────────
    public function updateOffice(Request $request, FooterOffice $footerOffice)
    {
        $data = $this->validateOffice($request);
        $data = $this->handleFlag($request, $data, $footerOffice);

        $footerOffice->update($data);

        return back()->with('success', "{$footerOffice->country} office updated.");
    }

    // ─────────────────────────────────────────────────────────
    //  OFFICES — toggle / delete / restore / sort
    // ─────────────────────────────────────────────────────────
    public function toggleOffice(FooterOffice $footerOffice)
    {
        $footerOffice->update([
            'status' => $footerOffice->status === 'active' ? 'inactive' : 'active',
        ]);
        return back()->with('success', "{$footerOffice->country} set to " . ucfirst($footerOffice->status) . '.');
    }

    public function destroyOffice(FooterOffice $footerOffice)
    {
        $label = $footerOffice->country;
        $footerOffice->delete();
        return back()->with('success', "{$label} office deleted.");
    }

    public function restoreOffice(int $id)
    {
        $office = FooterOffice::withTrashed()->findOrFail($id);
        $office->restore();
        return back()->with('success', "{$office->country} restored.");
    }

    public function sortOffices(Request $request)
    {
        $request->validate(['items' => 'required|array', 'items.*' => 'integer']);
        foreach ($request->items as $order => $id) {
            FooterOffice::where('id', $id)->update(['sort_order' => $order]);
        }
        return response()->json(['ok' => true]);
    }

    // ─────────────────────────────────────────────────────────
    //  PRIVATE HELPERS
    // ─────────────────────────────────────────────────────────

    private function validateSettings(Request $request): array
    {
        return $request->validate([
            'tagline'        => 'nullable|string|max:500',
            'copyright_text' => 'required|string|max:500',
            'status'         => 'required|in:active,inactive',
            'logo'           => 'nullable|file|mimes:svg,jpeg,png,webp|max:2048',
        ]);
    }

    private function handleLogo(Request $request, array $data, ?FooterSetting $existing = null): array
    {
        if ($request->hasFile('logo')) {
            if ($existing && $existing->logo_path) {
                Storage::disk('public')->delete($existing->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('footer/logo', 'public');
        }
        unset($data['logo']);
        return $data;
    }

    private function validateSocial(Request $request): array
    {
        return $request->validate([
            'platform' => 'required|string|max:80',
            'url'      => 'required|url|max:500',
            'icon_key' => 'required|string|max:40',
            'status'   => 'required|in:active,inactive',
        ]);
    }

    private function validateOffice(Request $request): array
    {
        return $request->validate([
            'country'     => 'required|string|max:120',
            'address'     => 'nullable|string|max:500',
            'phone'       => 'nullable|string|max:60',
            'email'       => 'nullable|email|max:180',
            'address_url' => 'nullable|url|max:500',
            'status'      => 'required|in:active,inactive',
            'flag'        => 'nullable|file|mimes:jpeg,png,webp,svg|max:1024',
        ]);
    }

    private function handleFlag(Request $request, array $data, ?FooterOffice $existing = null): array
    {
        if ($request->hasFile('flag')) {
            if ($existing && $existing->flag_path) {
                Storage::disk('public')->delete($existing->flag_path);
            }
            $data['flag_path'] = $request->file('flag')->store('footer/flags', 'public');
        }
        unset($data['flag']);

        if (empty($data['address_url'])) {
            $data['address_url'] = '#';
        }
        return $data;
    }
}
