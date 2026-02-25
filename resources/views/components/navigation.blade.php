{{-- Mobile Menu --}}
<div id="mobile-menu"
    class="fixed inset-0 z-50 bg-black translate-x-full transition-transform duration-300 ease-in-out lg:hidden">
    <div class="p-6 h-full flex flex-col">
        {{-- Mobile Header --}}
        <div class="flex items-center justify-between mb-10">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="DevDimensions Logo" class="w-full h-auto">
            </a>
            <button id="mobile-close" class="text-white p-2" aria-label="Close menu">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>

        {{-- Mobile Nav Links --}}
        <nav class="flex-1">
            <ul class="space-y-1">
                <li>
                    <a href="{{ url('/') }}"
                        class="block py-4 text-2xl font-medium border-b border-white/10 transition-colors duration-200
                              {{ request()->is('/') ? 'text-white font-bold' : 'text-[#A0A0A0] hover:text-white' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/about-us') }}"
                        class="block py-4 text-2xl font-medium border-b border-white/10 transition-colors duration-200
                              {{ request()->is('about-us') ? 'text-white font-bold' : 'text-white/70 hover:text-white' }}">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ url('/case-studies') }}"
                        class="block py-4 text-2xl font-medium border-b border-white/10 transition-colors duration-200
                              {{ request()->is('case-studies') ? 'text-white font-bold' : 'text-white/70 hover:text-white' }}">
                        Case Studies
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contact-us') }}"
                        class="block py-4 text-2xl font-medium border-b border-white/10 transition-colors duration-200
                              {{ request()->is('contact-us') ? 'text-white font-bold' : 'text-white/70 hover:text-white' }}">
                        Contact Us
                    </a>
                </li>
            </ul>
        </nav>

        {{-- Mobile CTA --}}
        <div class="mt-8">
            <a href="{{ url('/contact-us') }}"
                class="block w-full text-center py-4 px-6 border-2 border-white rounded-xl text-white font-semibold text-lg
                      hover:bg-white hover:text-black transition-all duration-200">
                Get Free Consultation
            </a>
        </div>
    </div>
</div>

{{-- Mobile Overlay --}}
<div id="mobile-overlay" class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm hidden lg:hidden"></div>


{{-- Desktop Navigation --}}
<nav id="main-nav" class="fixed top-0 left-0 right-0 py-[30px] z-30 transition-all duration-300">
    {{-- Applying your container constraints: Max-width 1320px at XXL --}}
    <div
        class="mx-auto px-6 lg:px-8 max-w-full sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1140px] 2xl:max-w-[1360px]">
        <div class="flex items-center justify-between">

            {{-- Logo - Updated path to assets/images/logo.svg --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="DevDimensions Logo" class="w-full h-auto">

            </a>

            {{-- Desktop Nav Links --}}
            <ul class="hidden lg:flex items-center gap-10">
                <li>
                    <a href="{{ url('/') }}"
                        class="text-sm transition-colors duration-200 relative group
                              {{ request()->is('/') ? 'text-white font-bold' : 'text-[#A0A0A0] hover:text-white font-medium' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/about-us') }}"
                        class="text-sm transition-colors duration-200 relative
                              {{ request()->is('about-us') ? 'text-white font-bold' : 'text-[#A0A0A0] hover:text-white font-medium' }}">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ url('/case-studies') }}"
                        class="text-sm transition-colors duration-200 relative
                              {{ request()->is('case-studies') ? 'text-white font-bold' : 'text-[#A0A0A0] hover:text-white font-medium' }}">
                        Case Studies
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contact-us') }}"
                        class="text-sm transition-colors duration-200 relative
                              {{ request()->is('contact-us') ? 'text-white font-bold' : 'text-[#A0A0A0] hover:text-white font-medium' }}">
                        Contact Us
                    </a>
                </li>
            </ul>

            {{-- Right Side: CTA + Hamburger --}}
            <div class="flex items-center gap-4">
                <a href="{{ url('/contact-us') }}"
                    class="hidden lg:inline-flex items-center px-6 py-2.5 border border-white rounded-lg text-white text-sm font-medium
                          hover:bg-[linear-gradient(90deg,_rgba(181,30,23,1)_0%,_rgba(252,63,55,1)_100%)] hover:border-[#B51E17] hover:text-white transition-all duration-200 whitespace-nowrap">
                    Get Free Consultation
                </a>

                <button id="mobile-open" class="lg:hidden text-white p-2" aria-label="Open menu">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        (function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const openBtn = document.getElementById('mobile-open');
            const closeBtn = document.getElementById('mobile-close');
            const nav = document.getElementById('main-nav');

            function openMenu() {
                mobileMenu.classList.remove('translate-x-full');
                mobileOverlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeMenu() {
                mobileMenu.classList.add('translate-x-full');
                mobileOverlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            openBtn.addEventListener('click', openMenu);
            closeBtn.addEventListener('click', closeMenu);
            mobileOverlay.addEventListener('click', closeMenu);

            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    nav.classList.add('bg-black/95', 'backdrop-blur-md', 'border-b', 'border-white/5');
                    nav.classList.remove('py-[30px]');
                    nav.classList.add('py-[15px]');
                } else {
                    nav.classList.remove('bg-black/95', 'backdrop-blur-md', 'border-b', 'border-white/5');
                    nav.classList.add('py-[30px]');
                    nav.classList.remove('py-[15px]');
                }
            });

            if (window.scrollY > 20) {
                nav.classList.add('bg-black/95', 'backdrop-blur-md', 'border-b', 'border-white/5');
            }
        })();
    </script>
@endpush
