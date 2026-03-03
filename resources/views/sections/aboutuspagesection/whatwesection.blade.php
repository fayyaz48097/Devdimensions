@php
    use App\Models\AboutMissionVision;
    $section = AboutMissionVision::published()->latest()->first();
@endphp

@if ($section)
    <section class="pt-0 what-we" style="padding-bottom: 160px;">
        <div
            class="mx-auto px-6 lg:px-8 max-w-full sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1140px] 2xl:max-w-[1320px]">

            <div class="mission_vision" style="margin-top: 96px; padding: 0;">
                <div class="flex flex-wrap -mx-3">

                    <!-- Mission -->
                    <div class="w-full px-3 lg:w-1/2">
                        <div class="comparision mmb-40" style="padding-left: 76px; position: relative;">
                            <img src="{{ $section->missionIconUrl() ?? asset('assets/images/our-mision.png') }}"
                                alt="Mission Icon" class="icon"
                                style="position:absolute; left:0; top:0; width:50px; height:50px; object-fit:contain;">
                            <h5 class="white-E7"
                                style="font-family:'Gilroy-Medium',sans-serif; font-size:28px; letter-spacing:-0.56px;">
                                {{ $section->mission_title }}
                            </h5>
                            <p class="grey-DB lh-26" style="margin-bottom:0;">
                                {!! nl2br(e($section->mission_description)) !!}
                            </p>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="w-full px-3 mt-10 lg:w-1/2 lg:mt-0">
                        <div class="comparision mmb-40" style="padding-left: 76px; position: relative;">
                            <img src="{{ $section->visionIconUrl() ?? asset('assets/images/our-vision.png') }}"
                                alt="Vision Icon" class="icon"
                                style="position:absolute; left:0; top:0; width:50px; height:50px; object-fit:contain;">
                            <h5 class="white-E7"
                                style="font-family:'Gilroy-Medium',sans-serif; font-size:28px; letter-spacing:-0.56px;">
                                {{ $section->vision_title }}
                            </h5>
                            <p class="grey-DB lh-26" style="margin-bottom:0;">
                                {!! nl2br(e($section->vision_description)) !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endif
