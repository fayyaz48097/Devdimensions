{{--
    SAVE AS: resources/views/components/topbar.blade.php
    Fixes:
    1. Admin dropdown — solid #111 background (was transparent)
    2. "Admin" text — white
--}}

<style>
    #admin-topbar {
        background: #0A0A0A;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        padding: 0 24px;
        height: 64px;
        display: flex;
        align-items: center;
        gap: 16px;
        position: sticky;
        top: 0;
        z-index: 30;
    }

    /* ── Breadcrumb ── */
    .topbar-breadcrumb {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #4A4A4A;
    }

    .topbar-breadcrumb a {
        color: #4A4A4A;
        text-decoration: none;
        transition: color 0.2s;
    }

    .topbar-breadcrumb a:hover {
        color: #888;
    }

    .topbar-breadcrumb .crumb-current {
        color: #C0C0C0;
        font-weight: 500;
    }

    /* ── Search ── */
    .topbar-search {
        position: relative;
        flex: 1;
        max-width: 320px;
    }

    .topbar-search input {
        width: 100%;
        height: 38px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 8px;
        padding: 0 14px 0 38px;
        font-size: 13px;
        color: #C0C0C0;
        outline: none;
        transition: border-color 0.2s, background 0.2s;
        font-family: inherit;
    }

    .topbar-search input::placeholder {
        color: #3A3A3A;
    }

    .topbar-search input:focus {
        border-color: rgba(252, 63, 55, 0.35);
        background: rgba(252, 63, 55, 0.04);
    }

    .topbar-search .search-icon {
        position: absolute;
        left: 11px;
        top: 50%;
        transform: translateY(-50%);
        color: #3A3A3A;
        pointer-events: none;
    }

    /* ── Icon button ── */
    .topbar-btn {
        position: relative;
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.07);
        color: #555;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        flex-shrink: 0;
    }

    .topbar-btn:hover {
        color: #C0C0C0;
        border-color: rgba(255, 255, 255, 0.12);
        background: rgba(255, 255, 255, 0.07);
    }

    .topbar-btn .notif-dot {
        position: absolute;
        top: 7px;
        right: 7px;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #FC3F37;
        border: 1.5px solid #0A0A0A;
    }

    /* ── Live site btn ── */
    .topbar-live-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0 14px;
        height: 36px;
        border-radius: 8px;
        font-size: 12.5px;
        font-weight: 500;
        color: #C0C0C0;
        text-decoration: none;
        border: 1px solid rgba(255, 255, 255, 0.10);
        transition: all 0.2s;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .topbar-live-btn:hover {
        background: rgba(255, 255, 255, 0.06);
        border-color: rgba(255, 255, 255, 0.18);
        color: #fff;
    }

    /* ── User button ── */
    #topbar-user-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        height: 38px;
        padding: 0 12px;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
        cursor: pointer;
        transition: all 0.2s;
        flex-shrink: 0;
    }

    #topbar-user-btn:hover {
        background: rgba(255, 255, 255, 0.07);
        border-color: rgba(255, 255, 255, 0.14);
    }

    .user-avatar {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(181, 30, 23, 1), rgba(252, 63, 55, 1));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    /* FIX 2: Admin name — white, not black */
    .user-name {
        font-size: 13px;
        font-weight: 500;
        color: #FFFFFF;
        white-space: nowrap;
    }

    .user-chevron {
        color: #555;
        flex-shrink: 0;
    }

    /* ── Dropdown ── FIX 1: solid background */
    #topbar-user-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 8px);
        width: 210px;

        /* SOLID background — was transparent before */
        background: #111111;
        border: 1px solid rgba(255, 255, 255, 0.10);
        border-radius: 12px;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.90), 0 0 0 1px rgba(255, 255, 255, 0.04);

        opacity: 0;
        pointer-events: none;
        transform: translateY(6px);
        transition: opacity 0.2s ease, transform 0.2s ease;
        z-index: 9999;
    }

    #topbar-user-menu.is-open {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
    }

    .menu-top-line {
        height: 1px;
        margin: 0 16px;
        background: linear-gradient(90deg, transparent, rgba(252, 63, 55, 0.5), transparent);
        border-radius: 2px;
    }

    .menu-body {
        padding: 8px;
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 12px;
        border-radius: 8px;
        font-size: 13px;
        color: #888;
        text-decoration: none;
        transition: all 0.15s;
        cursor: pointer;
    }

    .menu-item:hover {
        background: rgba(255, 255, 255, 0.06);
        color: #E0E0E0;
    }

    .menu-item svg {
        flex-shrink: 0;
    }

    .menu-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.06);
        margin: 4px 8px;
    }

    .menu-item-danger:hover {
        background: rgba(252, 63, 55, 0.08);
        color: #FC3F37;
    }
</style>

<header id="admin-topbar">

    {{-- Hamburger (mobile) --}}
    <button id="sidebar-open" class="p-1.5 text-[#555] hover:text-white lg:hidden -ml-1 flex-shrink-0"
        aria-label="Open sidebar">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    {{-- Breadcrumb (desktop) --}}
    <div class="topbar-breadcrumb" style="display:none;" id="topbar-bc">
        <a href="{{ route('admin.dashboard') }}">Admin</a>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            stroke-linecap="round">
            <polyline points="9 18 15 12 9 6" />
        </svg>
        <span class="crumb-current">@yield('page-title', 'Dashboard')</span>
    </div>

    {{-- Search --}}
    <div class="topbar-search" style="display:none;" id="topbar-search">
        <span class="search-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </span>
        <input type="text" placeholder="Search anything..." id="admin-search">
    </div>

    <div style="flex:1;"></div>

    {{-- Live Site --}}
    <a href="{{ url('/') }}" target="_blank" class="topbar-live-btn" id="topbar-live" style="display:none;">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round">
            <circle cx="12" cy="12" r="10" />
            <line x1="2" y1="12" x2="22" y2="12" />
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
        </svg>
        Live Site
    </a>

    {{-- Notifications --}}
    <button class="topbar-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>
        <span class="notif-dot"></span>
    </button>

    {{-- User dropdown ── FIX 1 + FIX 2 --}}
    <div style="position:relative;" id="topbar-user-wrap">

        <button id="topbar-user-btn" aria-label="User menu">
            <div class="user-avatar">AD</div>
            <span class="user-name" id="user-name-text">Admin</span>
            <svg class="user-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </button>

        <div id="topbar-user-menu">
            <div class="menu-top-line"></div>
            <div class="menu-body">
                <a href="{{ route('admin.profile') }}" class="menu-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    My Profile
                </a>
                <a href="{{ route('admin.settings.general') }}" class="menu-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round">
                        <circle cx="12" cy="12" r="3" />
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                    </svg>
                    Settings
                </a>
                <div class="menu-divider"></div>
                @include('components.admin.logout-btn')
            </div>
        </div>

    </div>

</header>

{{-- Show responsive elements after render --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show elements based on screen size
        function applyResponsive() {
            var w = window.innerWidth;
            document.getElementById('topbar-bc').style.display = w >= 768 ? 'flex' : 'none';
            document.getElementById('topbar-search').style.display = w >= 640 ? 'block' : 'none';
            document.getElementById('topbar-live').style.display = w >= 640 ? 'inline-flex' : 'none';
        }
        applyResponsive();
        window.addEventListener('resize', applyResponsive);

        // Dropdown toggle
        var btn = document.getElementById('topbar-user-btn');
        var menu = document.getElementById('topbar-user-menu');

        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            menu.classList.toggle('is-open');
        });

        document.addEventListener('click', function(e) {
            if (!document.getElementById('topbar-user-wrap').contains(e.target)) {
                menu.classList.remove('is-open');
            }
        });
    });
</script>
