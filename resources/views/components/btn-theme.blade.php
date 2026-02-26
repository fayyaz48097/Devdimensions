{{--
    Red Gradient Button Component
    Usage:
        <x-btn-theme href="{{ url('/contact-us') }}" label="7 Days Free Trial" />
        <x-btn-theme href="{{ url('/about') }}" label="Learn More" class="mt-10" />
--}}

@props([
    'href' => '#',
    'label' => 'Get Started',
])

<a href="{{ $href }}" {{ $attributes->only('class') }}
    class="group relative inline-flex items-center
          h-[44px] w-[188px]
          pl-5 pr-[52px]
          rounded-[5px]
          text-white text-[14px] font-medium capitalize
          whitespace-nowrap
          transition-all duration-300 ease-in-out
          no-underline"
    style="background: linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%); line-height: 44px; text-decoration: none;"
    onmouseover="this.style.background='rgba(181,30,23,1)'"
    onmouseout="this.style.background='linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%)'">

    {{ $label }}

    {{-- Icon wrapper --}}
    <span
        class="absolute right-2 top-1/2 -translate-y-1/2
                 flex items-center justify-center
                 w-[30px] h-[30px]">

        {{-- Diamond bg: starts square → rotates 45deg on hover --}}
        <span
            class="absolute inset-0
                     bg-white/20 rounded-[4px]
                     transition-all duration-300 ease-in-out
                     group-hover:rotate-45 group-hover:bg-white/10">
        </span>

        {{-- Arrow: diagonal (northeast) → straightens right on hover --}}
        <svg class="relative z-10 transition-all duration-300 ease-in-out -rotate-45 group-hover:rotate-0" width="18"
            height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round"
            stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12" />
            <polyline points="12 5 19 12 12 19" />
        </svg>
    </span>
</a>
