{{-- ============================================================
     What We / Mission & Vision Section
     resources/views/sections/aboutuspagesection/whatwesection.blade.php
     Mirrors original WordPress: .what-we > .container > .mission_vision > .row > .col-lg-6 > .comparision
============================================================ --}}

<section class="pt-0 what-we" style="padding-bottom: 160px;">
    <div
        class="mx-auto px-6 lg:px-8 max-w-full sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1140px] 2xl:max-w-[1320px]">

        {{-- Optional heading (empty in original) --}}
        <h2 class="white-E7 letter_-096"></h2>

        {{-- Mission & Vision row — .mission_vision --}}
        <div class="mission_vision" style="margin-top: 96px; padding: 0;">
            <div class="flex flex-wrap -mx-3">

                {{-- ── Our Mission ── --}}
                <div class="w-full px-3 lg:w-1/2">
                    <div class="comparision mmb-40" style="padding-left: 76px; position: relative;">
                        <img src="{{ asset('assets/images/our-mision.png') }}" alt="Our Mission" class="icon"
                            style="position:absolute; left:0; top:0; width:50px; height:50px; object-fit:contain;">
                        <h5 class="white-E7"
                            style="font-family:'Gilroy-Medium',sans-serif; font-size:28px; letter-spacing:-0.56px;">
                            Our Mission
                        </h5>
                        <p class="grey-DB lh-26" style="margin-bottom:0;">
                            Our mission is to enable the talent, cultivating a fertile ground where
                            professional growth and innovation bloom. Our aim is to channel this
                            reservoir of expertise into building success stories for clients.
                        </p>
                    </div>
                </div>

                {{-- ── Our Vision ── --}}
                <div class="w-full px-3 mt-10 lg:w-1/2 lg:mt-0">
                    <div class="comparision mmb-40" style="padding-left: 76px; position: relative;">
                        <img src="{{ asset('assets/images/our-vision.png') }}" alt="Our Vision" class="icon"
                            style="position:absolute; left:0; top:0; width:50px; height:50px; object-fit:contain;">
                        <h5 class="white-E7"
                            style="font-family:'Gilroy-Medium',sans-serif; font-size:28px; letter-spacing:-0.56px;">
                            Our vision
                        </h5>
                        <p class="grey-DB lh-26" style="margin-bottom:0;">
                            Our vision is a world where every company has access to a dream team to
                            accelerate their success. We provide a pain free way to source global talent,
                            setting the stage for a lifetime of innovation.
                        </p>
                    </div>
                </div>

            </div>{{-- /.flex --}}
        </div>{{-- /.mission_vision --}}

    </div>{{-- /.container --}}
</section>
