<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.header')

<body class="antialiased text-white bg-black font-gilroy">
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
