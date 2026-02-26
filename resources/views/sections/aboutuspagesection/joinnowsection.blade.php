{{-- join-now section using Tailwind only --}}
<section class="relative w-full overflow-hidden py-14">

    {{-- Decorative dot top-left --}}
    <span class="absolute left-[15%] top-[25%] w-2 h-2 rounded-full bg-gray-600 opacity-60"></span>
    {{-- Decorative dot top-right --}}
    <span class="absolute right-[25%] top-[18%] w-2 h-2 rounded-full bg-cyan-600 opacity-70"></span>

    <div class="container px-4 pb-12 mx-auto">
        <div class="max-w-[766px] mx-auto text-center">

            {{-- Logo --}}
            <img src="https://devdimensions.com/wp-content/uploads/2023/07/logo_d.svg" alt="logo_d"
                class="mx-auto mb-10">

            {{-- Heading --}}
            <h2 class="text-[#E7E7E7] text-4xl md:text-5xl font-semibold tracking-[-0.96px] mt-10 mb-5 leading-tight">
                Your turn to step up to the plate!
            </h2>

            {{-- Paragraph --}}
            <p class="text-[#DBDBDB] max-w-[671px] mx-auto text-base leading-relaxed mb-6">
                You've gotten to know the line-up behind DevDimensions, now it's our turn to learn about
                your game plan. Join our team and let's huddle to talk strategy.
            </p>

            {{-- CTA Button --}}
            <a href="{{ url('/contact-us') }}"
                class="relative inline-block mt-5 text-white transition-all duration-300 ease-in-out group"
                style="border: 0;
          font-size: 14px;
          font-weight: 500;
          text-transform: capitalize;
          height: 44px;
          line-height: 44px;
         width: 188px;
          padding: 0 60px 0 20px;
          border-radius: 5px;
          background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
          text-decoration: none;
          display: inline-block;"
                onmouseover="this.style.background='rgba(181, 30, 23, 1)';"
                onmouseout="this.style.background='linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%)'">

                Let's Dive In

                {{-- Icon Wrapper --}}
                <span
                    class="absolute top-1/2 right-2 -translate-y-1/2 flex items-center justify-center w-[30px] h-[30px]">

                    {{-- Diamond Background Shape (Starts at 0, rotates to 45) --}}
                    <span
                        class="absolute inset-0 bg-white/20 rounded-[4px] transition-all duration-300 ease-in-out group-hover:rotate-[45deg] group-hover:bg-white/10"></span>

                    {{-- Arrow Icon (Starts horizontal, rotates to top-right corner) --}}
                    <svg class="relative z-10 transition-all duration-300 ease-in-out -rotate-45 translate-x-0 group-hover:rotate-0 group-hover:translate-x-0"
                        width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>
