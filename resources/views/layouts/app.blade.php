<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.header')

<body class="font-gilroy antialiased bg-black text-white">
    <div class="min-h-screen">
        <!-- Navigation -->
        @include('components.navigation')


        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>

    @stack('scripts')
</body>

</html>
