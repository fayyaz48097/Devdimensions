{{--
    Logout Button Partial
    Include this wherever you want a logout button (topbar, sidebar, profile dropdown, etc.)
    Usage: @include('components.admin.logout-btn')
--}}
<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit"
        class="flex items-center w-full gap-2 px-4 py-2 text-sm text-gray-400 transition-colors duration-150 rounded-lg hover:text-white hover:bg-white/5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            <polyline points="16 17 21 12 16 7" />
            <line x1="21" y1="12" x2="9" y2="12" />
        </svg>
        <span>Logout</span>
    </button>
</form>
