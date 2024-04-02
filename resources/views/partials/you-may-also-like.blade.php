<!-- You may also like Desktop & Mobile -->
<div class="tw-flex-col tw-flex tw-relative">
  <h2 class="max-screen tw-w-full tw-font-agoda-sans-stemless tw-my-[calc(37/var(--base-screen)*100vw)] lg:tw-my-[calc(46/var(--base-screen)*100vw)] xl:tw-my-[46px] tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] tw-text-[#2A2A2E]">You may also like</h2>
  <div class="may-also-like tw-flex tw-w-full tw-items-center tw-relative tw-pb-5 tw-max-w-[calc(100vw-(45/var(--base-screen)*100vw))] tw-mx-auto lg:tw-px-[calc(20/var(--base-screen)*100vw)] xl:tw-px-[20px] lg:tw-max-w-[calc(((1631.17+20)/var(--base-screen))*100vw)] xl:tw-max-w-[calc(1631.17px+20px)]">
    <!-- Right Arrow -->
    <div class="agoda-swiper-next tw-cursor-pointer hover:tw-opacity-100 tw-delay-100 tw-transition-opacity tw-absolute tw-rounded-full tw-right-[calc(18/var(--base-screen)*100vw)] tw-top-[calc(130/var(--base-screen)*100vw)] lg:tw-right-[calc(47/var(--base-screen)*100vw)] xl:tw-right-[47px] tw-flex tw-items-center tw-justify-center tw-bg-[#1C1C1C] tw-opacity-[60%] tw-w-[calc(54/var(--base-screen)*100vw)] tw-h-[calc(54/var(--base-screen)*100vw)] lg:tw-w-[calc(73/var(--base-screen)*100vw)] lg:tw-h-[calc(73/var(--base-screen)*100vw)] xl:tw-w-[73px] xl:tw-h-[73px] tw-z-10 tw-text-white">
      <img src="@asset('images/svg/chevron_next.svg')" class="tw-w-[calc(12.38/var(--base-screen)*100vw)] lg:tw-w-[calc(16.73/var(--base-screen)*100vw)] xl:tw-w-[16.73px] tw-h-auto " />
    </div>
    <!-- Left Arriw -->
    <div style="display: none;" class="agoda-swiper-prev tw-cursor-pointer hover:tw-opacity-100 tw-delay-100 tw-transition-opacity tw-absolute tw-rounded-full tw-left-[calc(18/var(--base-screen)*100vw)] tw-top-[calc(130/var(--base-screen)*100vw)] lg:tw-left-[calc(37/var(--base-screen)*100vw)] xl:tw-left-[37px] tw-flex tw-items-center tw-justify-center tw-bg-[#1C1C1C] tw-opacity-[60%] tw-w-[calc(54/var(--base-screen)*100vw)] tw-h-[calc(54/var(--base-screen)*100vw)] lg:tw-w-[calc(73/var(--base-screen)*100vw)] lg:tw-h-[calc(73/var(--base-screen)*100vw)] xl:tw-w-[73px] xl:tw-h-[73px] tw-z-10 tw-text-white">
      <img src="@asset('images/svg/chevron_next.svg')" class="tw-w-[calc(12.38/var(--base-screen)*100vw)] lg:tw-w-[calc(16.73/var(--base-screen)*100vw)] xl:tw-w-[16.73px] tw-h-auto tw-rotate-180" />
    </div>

    <!-- Cards -->
    <div class="may-also-like-wrapper tw-flex tw-flex-nowrap tw-gap-x-[calc(10/var(--base-screen)*100vw)] md:tw-gap-x-[calc(20/var(--base-screen)*100vw)] lg:tw-gap-[calc(43/var(--base-screen)*100vw)] xl:tw-gap-[43px]">
    @for($i=1; $i<=5; $i++)
        @include('components.you-may-also-like-card')
      @endfor
    </div>
  </div>
</div>