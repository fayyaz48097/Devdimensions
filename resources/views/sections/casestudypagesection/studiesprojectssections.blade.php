{{-- ============================================================
     Case Study Projects Section  —  DYNAMIC
     SAVE AS: resources/views/sections/casestudypagesection/studiesprojectssections.blade.php

     Data source : CaseStudyProject::live()
     Hides automatically when: no active, non-deleted projects exist.
============================================================ --}}

@php
    use App\Models\CaseStudyProject;
    $projects = CaseStudyProject::live();
@endphp

@if ($projects->isNotEmpty())

    <section class="w-full py-[80px] pb-[10px]">
        <div
            class="mx-auto px-4 md:px-6 lg:px-8
            max-w-full
            sm:max-w-[540px]
            md:max-w-[720px]
            lg:max-w-[960px]
            xl:max-w-[1140px]
            2xl:max-w-[1360px]">

            <div id="all-projects">

                @foreach ($projects as $index => $project)
                    @php $isOdd = ($index % 2 === 0); @endphp

                    {{-- Work Item --}}
                    <div class="relative w-full pb-[60px] md:pb-[160px]">

                        {{-- Decorative shapes — desktop only --}}
                        @if ($isOdd)
                            <img src="{{ asset('assets/images/rihght-shape.png') }}" alt=""
                                class="hidden md:block absolute right-[-40px] top-[-350px] z-0 pointer-events-none">
                        @else
                            <img src="{{ asset('assets/images/left-shape.png') }}" alt=""
                                class="hidden md:block absolute left-[-340px] top-[-426px] z-0 pointer-events-none object-contain">
                        @endif

                        {{-- =====================================================
                             MOBILE LAYOUT (hidden on md+)
                             ===================================================== --}}
                        <div class="block md:hidden">

                            <div class="relative w-full">

                                {{-- Badges overlaid top-left --}}
                                <div class="absolute z-10 flex flex-wrap gap-2 top-3 left-3">
                                    @foreach ($project->categories as $cat)
                                        <span
                                            class="inline-flex items-center h-[28px] px-3 text-[11px] font-medium text-white rounded-lg leading-none whitespace-nowrap"
                                            style="background: rgba(255,212,60,0.75);">
                                            {{ $cat }}
                                        </span>
                                    @endforeach
                                </div>

                                {{-- Arrow button overlaid top-right --}}
                                <a href="{{ url('/project/' . $project->slug) }}"
                                    class="absolute top-3 right-3 z-10 inline-flex items-center justify-center w-[36px] h-[36px] rounded-[6px]"
                                    style="background: linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%);">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="7" y1="17" x2="17" y2="7" />
                                        <polyline points="7 7 17 7 17 17" />
                                    </svg>
                                </a>

                                @if ($project->imageUrl())
                                    <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}"
                                        class="object-cover object-top w-full h-auto rounded-md">
                                @endif
                            </div>

                            <div class="px-1 pt-4">
                                <div class="flex flex-wrap items-center mb-3 gap-x-3 gap-y-2">
                                    <h4 class="text-[#E7E7E7] text-[22px] font-semibold leading-normal mb-0">
                                        {{ $project->title }}
                                    </h4>
                                </div>
                                <p class="text-[#A0A0A0] italic text-[14px] leading-[1.6] mb-3">
                                    {{ $project->description }}
                                </p>
                                @if ($project->toolUrls())
                                    <div class="flex items-center gap-3">
                                        <span class="text-[#EDEDED] text-[14px] font-medium">Tools:</span>
                                        @foreach ($project->toolUrls() as $toolUrl)
                                            <img src="{{ $toolUrl }}" alt="tool" class="inline-block h-auto">
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        </div>

                        {{-- =====================================================
                             DESKTOP LAYOUT (hidden below md)
                             ===================================================== --}}
                        <div class="relative z-10 hidden gap-8 md:flex md:flex-row md:items-center">

                            @if ($isOdd)
                                {{-- Content LEFT --}}
                                <div class="w-1/2 pr-10">
                                    <div class="max-w-[608px] py-[50px]">
                                        <div class="flex flex-wrap items-center mb-5 gap-x-4 gap-y-2">
                                            <h4 class="text-[#E7E7E7] text-[32px] font-semibold leading-normal mb-0">
                                                <a href="{{ url('/project/' . $project->slug) }}"
                                                    class="text-[#E7E7E7] no-underline hover:text-[#B51E17] transition-colors duration-300">
                                                    {{ $project->title }}
                                                </a>
                                            </h4>
                                            @foreach ($project->categories as $cat)
                                                <span
                                                    class="inline-flex items-center h-[38px] px-[15px] text-[12px] text-white rounded-lg bg-[rgba(255,212,60,0.60)] leading-none whitespace-nowrap">
                                                    {{ $cat }}
                                                </span>
                                            @endforeach
                                        </div>
                                        <div class="mb-5">
                                            <p class="text-[#A0A0A0] italic text-[16px] leading-[1.6] mb-0 break-words">
                                                {{ $project->description }}
                                            </p>
                                        </div>
                                        @if ($project->toolUrls())
                                            <div class="flex items-center gap-4">
                                                <span class="text-[#EDEDED] text-[16px] font-medium">Tools:</span>
                                                @foreach ($project->toolUrls() as $toolUrl)
                                                    <img src="{{ $toolUrl }}" alt="tool"
                                                        class="inline-block h-auto">
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="mt-16">
                                            <a href="{{ url('/project/' . $project->slug) }}"
                                                class="group inline-flex items-center justify-center w-[50px] h-[50px] rounded-[8px] transition-all duration-300"
                                                style="background: rgba(255,255,255,0.20);"
                                                onmouseover="this.style.background='linear-gradient(90deg,rgba(181,30,23,1) 0%,rgba(252,63,55,1) 100%)'"
                                                onmouseout="this.style.background='rgba(255,255,255,0.20)'">
                                                <svg class="w-[25px] h-[25px] transition-transform duration-300 group-hover:rotate-45"
                                                    viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="7" y1="17" x2="17" y2="7" />
                                                    <polyline points="7 7 17 7 17 17" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {{-- Image RIGHT --}}
                                <div class="w-1/2">
                                    @if ($project->imageUrl())
                                        <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}"
                                            class="object-cover object-top w-full h-auto rounded-md">
                                    @endif
                                </div>
                            @else
                                {{-- Image LEFT --}}
                                <div class="w-1/2">
                                    @if ($project->imageUrl())
                                        <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}"
                                            class="object-cover object-top w-full h-auto rounded-md">
                                    @endif
                                </div>
                                {{-- Content RIGHT --}}
                                <div class="w-1/2 pl-10">
                                    <div class="max-w-[608px] ml-auto py-[50px]">
                                        <div class="flex flex-wrap items-center mb-5 gap-x-4 gap-y-2">
                                            <h4 class="text-[#E7E7E7] text-[32px] font-semibold leading-normal mb-0">
                                                <a href="{{ url('/project/' . $project->slug) }}"
                                                    class="text-[#E7E7E7] no-underline hover:text-[#B51E17] transition-colors duration-300">
                                                    {{ $project->title }}
                                                </a>
                                            </h4>
                                            @foreach ($project->categories as $cat)
                                                <span
                                                    class="inline-flex items-center h-[38px] px-[15px] text-[12px] text-white rounded-lg bg-[rgba(255,212,60,0.60)] leading-none whitespace-nowrap">
                                                    {{ $cat }}
                                                </span>
                                            @endforeach
                                        </div>
                                        <div class="mb-5">
                                            <p class="text-[#A0A0A0] italic text-[16px] leading-[1.6] mb-0">
                                                {{ $project->description }}
                                            </p>
                                        </div>
                                        @if ($project->toolUrls())
                                            <div class="flex items-center gap-4">
                                                <span class="text-[#EDEDED] text-[16px] font-medium">Tools:</span>
                                                @foreach ($project->toolUrls() as $toolUrl)
                                                    <img src="{{ $toolUrl }}" alt="tool"
                                                        class="inline-block h-auto">
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="mt-16">
                                            <a href="{{ url('/project/' . $project->slug) }}"
                                                class="group inline-flex items-center justify-center w-[50px] h-[50px] rounded-[8px] transition-all duration-300"
                                                style="background: rgba(255,255,255,0.20);"
                                                onmouseover="this.style.background='linear-gradient(90deg,rgba(181,30,23,1) 0%,rgba(252,63,55,1) 100%)'"
                                                onmouseout="this.style.background='rgba(255,255,255,0.20)'">
                                                <svg class="w-[25px] h-[25px] transition-transform duration-300 group-hover:rotate-45"
                                                    viewBox="0 0 24 24" fill="none" stroke="white"
                                                    stroke-width="2.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <line x1="7" y1="17" x2="17"
                                                        y2="7" />
                                                    <polyline points="7 7 17 7 17 17" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>

            {{-- Show More Button --}}
            <div class="pb-10 mt-4 text-center">
                <x-btn-theme href="#" label="Show More" />
            </div>

        </div>
    </section>

@endif
