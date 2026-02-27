{{-- ══════════════════════════════════════════════════════
     ADMIN SIDEBAR
     resources/views/admin/components/sidebar.blade.php
══════════════════════════════════════════════════════ --}}

<style>
    /* ── Sidebar base ── */
    #admin-sidebar {
        width: 260px;
        min-width: 260px;
        background: #0A0A0A;
        border-right: 1px solid rgba(255, 255, 255, 0.06);
        position: relative;
        z-index: 50;
    }

    /* ── Logo section divider line ── */
    .sidebar-logo-wrap::after {
        content: "";
        display: block;
        height: 1px;
        margin: 18px 20px 0;
        background: linear-gradient(90deg,
                transparent 0%,
                rgba(181, 30, 23, 0.5) 30%,
                rgba(252, 63, 55, 0.5) 50%,
                rgba(181, 30, 23, 0.5) 70%,
                transparent 100%);
    }

    /* ── Nav item base ── */
    .nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 13.5px;
        font-weight: 500;
        color: #7A7A7A;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
        text-decoration: none;
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
        letter-spacing: 0.1px;
    }

    .nav-item:hover {
        color: #E0E0E0;
        background: rgba(255, 255, 255, 0.04);
    }

    /* Active state */
    .nav-item.is-active {
        color: #fff;
        background: rgba(181, 30, 23, 0.12);
    }

    .nav-item.is-active::before {
        content: "";
        position: absolute;
        left: 0;
        top: 6px;
        bottom: 6px;
        width: 3px;
        background: linear-gradient(180deg, rgba(181, 30, 23, 1), rgba(252, 63, 55, 1));
        border-radius: 0 2px 2px 0;
    }

    .nav-item.is-active .nav-icon {
        color: #FC3F37;
    }

    /* ── Group label ── */
    .nav-group-label {
        font-size: 10.5px;
        font-weight: 600;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: #3A3A3A;
        padding: 18px 16px 6px;
    }

    /* ── Sub-nav (accordion) ── */
    .sub-nav {
        overflow: hidden;
        max-height: 0;
        transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .sub-nav.is-open {
        max-height: 400px;
    }

    .sub-nav-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px 8px 42px;
        font-size: 13px;
        color: #5A5A5A;
        cursor: pointer;
        transition: color 0.2s ease;
        text-decoration: none;
        border-radius: 6px;
        position: relative;
    }

    .sub-nav-item::before {
        content: "";
        position: absolute;
        left: 28px;
        top: 50%;
        transform: translateY(-50%);
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #2E2E2E;
        transition: background 0.2s ease;
    }

    .sub-nav-item:hover,
    .sub-nav-item.is-active {
        color: #DEDEDE;
    }

    .sub-nav-item.is-active::before,
    .sub-nav-item:hover::before {
        background: #FC3F37;
    }

    /* ── Chevron rotation ── */
    .nav-chevron {
        margin-left: auto;
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .nav-item.is-open .nav-chevron {
        transform: rotate(180deg);
    }

    /* ── Badge ── */
    .nav-badge {
        margin-left: auto;
        background: linear-gradient(90deg, rgba(181, 30, 23, 1), rgba(252, 63, 55, 1));
        color: #fff;
        font-size: 10px;
        font-weight: 600;
        padding: 2px 7px;
        border-radius: 20px;
        line-height: 1.4;
    }

    /* ── Bottom user card ── */
    .sidebar-user {
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .sidebar-user:hover {
        background: rgba(255, 255, 255, 0.03);
    }

    .sidebar-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(181, 30, 23, 1), rgba(252, 63, 55, 1));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    /* Mobile: off-canvas */
    @media (max-width: 1023px) {
        #admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100dvh;
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #admin-sidebar:not(.-translate-x-full) {
            transform: translateX(0);
        }
    }
</style>

<aside id="admin-sidebar" class="flex flex-col h-screen lg:h-auto lg:sticky lg:top-0">

    {{-- ── Logo ── --}}
    <div class="sidebar-logo-wrap"
        style="display:flex; align-items:center; justify-content:space-between; padding:20px 20px 0 20px;">
        <a href="{{ url('/') }}" style="display:flex; align-items:center; gap:8px; text-decoration:none;">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="DevDimensions"
                style="height:30px; width:auto; display:block;">
        </a>
        <button id="sidebar-close"
            style="padding:6px; color:#555; background:none; border:none; cursor:pointer; display:none;"
            aria-label="Close sidebar" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#555'">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
    </div>

    {{-- ── Scrollable nav area ── --}}
    <nav class="flex-1 px-3 py-3 overflow-y-auto">

        {{-- ── MAIN ── --}}
        <p class="nav-group-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
            class="nav-item {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" rx="1" />
                    <rect x="14" y="3" width="7" height="7" rx="1" />
                    <rect x="14" y="14" width="7" height="7" rx="1" />
                    <rect x="3" y="14" width="7" height="7" rx="1" />
                </svg>
            </span>
            Dashboard
        </a>

        {{-- ── CONTENT ── --}}
        <p class="nav-group-label">Content</p>

        {{-- Pages (with sub-menu) --}}
        <button class="nav-item {{ request()->routeIs('admin.pages.*') ? 'is-active is-open' : '' }}"
            data-toggle="sub-pages">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="16" y1="13" x2="8" y2="13" />
                    <line x1="16" y1="17" x2="8" y2="17" />
                    <polyline points="10 9 9 9 8 9" />
                </svg>
            </span>
            Pages
            <svg class="nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </button>
        <div class="sub-nav {{ request()->routeIs('admin.pages.*') ? 'is-open' : '' }}" id="sub-pages">
            <a href="{{ route('admin.pages.home') }}"
                class="sub-nav-item {{ request()->routeIs('admin.pages.home') ? 'is-active' : '' }}">
                Home
            </a>
            <a href="{{ route('admin.pages.about') }}"
                class="sub-nav-item {{ request()->routeIs('admin.pages.about') ? 'is-active' : '' }}">
                About Us
            </a>
            <a href="{{ route('admin.pages.casestudies') }}"
                class="sub-nav-item {{ request()->routeIs('admin.pages.casestudies') ? 'is-active' : '' }}">
                Case Studies
            </a>
            <a href="{{ route('admin.pages.contact') }}"
                class="sub-nav-item {{ request()->routeIs('admin.pages.contact') ? 'is-active' : '' }}">
                Contact Us
            </a>
        </div>

        {{-- Case Studies --}}
        <button class="nav-item {{ request()->routeIs('admin.casestudies.*') ? 'is-active is-open' : '' }}"
            data-toggle="sub-casestudies">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                </svg>
            </span>
            Case Studies
            <svg class="nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </button>
        <div class="sub-nav {{ request()->routeIs('admin.casestudies.*') ? 'is-open' : '' }}" id="sub-casestudies">
            <a href="{{ route('admin.casestudies.index') }}"
                class="sub-nav-item {{ request()->routeIs('admin.casestudies.index') ? 'is-active' : '' }}">
                All Projects
            </a>
            <a href="{{ route('admin.casestudies.create') }}"
                class="sub-nav-item {{ request()->routeIs('admin.casestudies.create') ? 'is-active' : '' }}">
                Add New
            </a>
            <a href="{{ route('admin.casestudies.categories') }}"
                class="sub-nav-item {{ request()->routeIs('admin.casestudies.categories') ? 'is-active' : '' }}">
                Categories
            </a>
        </div>

        {{-- Testimonials --}}
        <button class="nav-item {{ request()->routeIs('admin.testimonials.*') ? 'is-active is-open' : '' }}"
            data-toggle="sub-testimonials">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                </svg>
            </span>
            Testimonials
            <svg class="nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </button>
        <div class="sub-nav {{ request()->routeIs('admin.testimonials.*') ? 'is-open' : '' }}" id="sub-testimonials">
            <a href="{{ route('admin.testimonials.index') }}"
                class="sub-nav-item {{ request()->routeIs('admin.testimonials.index') ? 'is-active' : '' }}">
                All Reviews
            </a>
            <a href="{{ route('admin.testimonials.create') }}"
                class="sub-nav-item {{ request()->routeIs('admin.testimonials.create') ? 'is-active' : '' }}">
                Add New
            </a>
        </div>

        {{-- Partners --}}
        <a href="{{ route('admin.partners.index') }}"
            class="nav-item {{ request()->routeIs('admin.partners.*') ? 'is-active' : '' }}">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </span>
            Partners
        </a>

        {{-- ── LEADS ── --}}
        <p class="nav-group-label">Leads</p>

        {{-- Consultations --}}
        <a href="{{ route('admin.consultations.index') }}"
            class="nav-item {{ request()->routeIs('admin.consultations.*') ? 'is-active' : '' }}">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                </svg>
            </span>
            Consultations
            @if (($sidebarConsultCount ?? 0) > 0)
                <span class="nav-badge">{{ $sidebarConsultCount }}</span>
            @endif
        </a>

        {{-- Contact Submissions --}}
        <a href="{{ route('admin.contacts.index') }}"
            class="nav-item {{ request()->routeIs('admin.contacts.*') ? 'is-active' : '' }}">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
            </span>
            Contact Forms
        </a>

        {{-- ── SETTINGS ── --}}
        <p class="nav-group-label">Settings</p>

        {{-- General Settings --}}
        <button class="nav-item {{ request()->routeIs('admin.settings.*') ? 'is-active is-open' : '' }}"
            data-toggle="sub-settings">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3" />
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                </svg>
            </span>
            Settings
            <svg class="nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </button>
        <div class="sub-nav {{ request()->routeIs('admin.settings.*') ? 'is-open' : '' }}" id="sub-settings">
            <a href="{{ route('admin.settings.general') }}"
                class="sub-nav-item {{ request()->routeIs('admin.settings.general') ? 'is-active' : '' }}">
                General
            </a>
            <a href="{{ route('admin.settings.seo') }}"
                class="sub-nav-item {{ request()->routeIs('admin.settings.seo') ? 'is-active' : '' }}">
                SEO & Meta
            </a>
            <a href="{{ route('admin.settings.social') }}"
                class="sub-nav-item {{ request()->routeIs('admin.settings.social') ? 'is-active' : '' }}">
                Social Links
            </a>
        </div>

        {{-- Users --}}
        <button class="nav-item {{ request()->routeIs('admin.users.*') ? 'is-active is-open' : '' }}"
            data-toggle="sub-users">
            <span class="nav-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </span>
            Users
            <svg class="nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </button>
        <div class="sub-nav {{ request()->routeIs('admin.users.*') ? 'is-open' : '' }}" id="sub-users">
            <a href="{{ route('admin.users.index') }}"
                class="sub-nav-item {{ request()->routeIs('admin.users.index') ? 'is-active' : '' }}">
                All Users
            </a>
            <a href="{{ route('admin.users.create') }}"
                class="sub-nav-item {{ request()->routeIs('admin.users.create') ? 'is-active' : '' }}">
                Add New
            </a>
        </div>

    </nav>

    {{-- ── User Card (bottom) ── --}}
    <div class="sidebar-user">
        <div class="sidebar-avatar">AD</div>
        <div class="min-w-0">
            <p class="text-[13px] font-medium text-white leading-tight truncate">Admin User</p>
            <p class="text-[11px] text-[#4A4A4A] leading-tight truncate">admin@devdimensions.com</p>
        </div>
        <a href="{{ route('admin.logout') }}" class="ml-auto text-[#3A3A3A] hover:text-[#FC3F37] transition-colors"
            title="Logout">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
        </a>
    </div>

</aside>

@push('scripts')
    <script>
        // Accordion toggle for sidebar sub-menus
        document.querySelectorAll('[data-toggle]').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const target = document.getElementById(btn.getAttribute('data-toggle'));
                const isOpen = target.classList.contains('is-open');

                // Close all
                document.querySelectorAll('.sub-nav').forEach(function(sub) {
                    sub.classList.remove('is-open');
                });
                document.querySelectorAll('[data-toggle]').forEach(function(b) {
                    b.classList.remove('is-open');
                });

                // Open clicked (if it was closed)
                if (!isOpen) {
                    target.classList.add('is-open');
                    btn.classList.add('is-open');
                }
            });
        });
    </script>
@endpush
