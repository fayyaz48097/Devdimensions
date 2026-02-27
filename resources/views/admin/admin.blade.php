<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Admin | {{ config('app.name', 'DevDimensions') }}</title>
    <link rel="icon" href="{{ asset('assets/images/favicon-150x150.jpeg') }}" sizes="32x32">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="antialiased bg-[#050505] text-white font-gilroy" id="admin-body">

    <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-black/70 backdrop-blur-sm lg:hidden"></div>

    <div class="flex min-h-screen">

        {{-- Sidebar lives at: resources/views/components/sidebar.blade.php --}}
        @include('components.sidebar')

        <div class="flex flex-col flex-1 min-w-0 transition-all duration-300" id="admin-main">

            {{-- Topbar lives at: resources/views/components/topbar.blade.php --}}
            @include('components.topbar')

            <main class="flex-1 p-6 overflow-auto">
                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')

    <script>
        (function() {
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const openBtn = document.getElementById('sidebar-open');
            const closeBtn = document.getElementById('sidebar-close');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            if (openBtn) openBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (overlay) overlay.addEventListener('click', closeSidebar);
        })();
    </script>
</body>

</html>
