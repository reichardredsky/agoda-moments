<div class="tw-relative lg:tw-mt-[calc(-227/var(--base-screen)*100vw)] xl:tw-mt-[-227px]">
  <h2 class="tw-font-agoda-sans-stemless max-screen tw-my-[calc(30/var(--base-screen)*100vw)] lg:tw-my-0 tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] lg:tw-mb-[calc((38/var(--base-screen))*100vw)] xl:tw-mb-[38px] lg:tw-text-white">Featured Moments</h2>
  <!-- Featured Images Carousel -->

  <div class="agoda-swiper tw-flex tw-w-full tw-relative tw-pb-5 tw-max-w-[calc(100vw-(45/var(--base-screen)*100vw))] tw-mx-auto lg:tw-px-[calc(20/var(--base-screen)*100vw)] xl:tw-px-[20px] lg:tw-max-w-[calc(((1631.17+20)/var(--base-screen))*100vw)] xl:tw-max-w-[calc(1631.17px+20px)]">
    <!-- Right Arrow -->
    <div class="agoda-swiper-next tw-cursor-pointer hover:tw-opacity-100 tw-delay-100 tw-transition-opacity tw-absolute tw-rounded-full tw-right-[calc(18/var(--base-screen)*100vw)] lg:tw-right-[calc(47/var(--base-screen)*100vw)] tw-top-[calc(97/var(--base-screen)*100vw)] lg:tw-top-[calc(192/var(--base-screen)*100vw)] xl:tw-top-[192px] xl:tw-right-[47px] tw-flex tw-items-center tw-justify-center tw-bg-[#1C1C1C] tw-opacity-[60%] tw-w-[calc(54/var(--base-screen)*100vw)] tw-h-[calc(54/var(--base-screen)*100vw)] lg:tw-w-[calc(73/var(--base-screen)*100vw)] lg:tw-h-[calc(73/var(--base-screen)*100vw)] xl:tw-w-[73px] xl:tw-h-[73px] tw-z-10 tw-text-white">
      <img src="@asset('images/svg/chevron_next.svg')" class="tw-w-[calc(12.38/var(--base-screen)*100vw)] lg:tw-w-[calc(16.73/var(--base-screen)*100vw)] xl:tw-w-[16.73px] tw-h-auto " />
    </div>
    <!-- Left Arriw -->
    <div style="display: none;" class="agoda-swiper-prev tw-cursor-pointer hover:tw-opacity-100 tw-delay-100 tw-transition-opacity tw-absolute tw-rounded-full tw-left-[calc(18/var(--base-screen)*100vw)] lg:tw-left-[calc(37/var(--base-screen)*100vw)] xl:tw-left-[37px] tw-top-[calc(97/var(--base-screen)*100vw)] lg:tw-top-[calc(192/var(--base-screen)*100vw)] xl:tw-top-[192px] tw-flex tw-items-center tw-justify-center tw-bg-[#1C1C1C] tw-opacity-[60%] tw-w-[calc(54/var(--base-screen)*100vw)] tw-h-[calc(54/var(--base-screen)*100vw)] lg:tw-w-[calc(73/var(--base-screen)*100vw)] lg:tw-h-[calc(73/var(--base-screen)*100vw)] xl:tw-w-[73px] xl:tw-h-[73px] tw-z-10 tw-text-white">
      <img src="@asset('images/svg/chevron_next.svg')" class="tw-w-[calc(12.38/var(--base-screen)*100vw)] lg:tw-w-[calc(16.73/var(--base-screen)*100vw)] xl:tw-w-[16.73px] tw-h-auto tw-rotate-180" />
    </div>

    <!-- Items -->
    <div class="agoda-swiper-wrapper tw-w-full tw-flex tw-flex-nowrap tw-gap-x-[calc(10/var(--base-screen)*100vw)] md:tw-gap-x-[calc(10/var(--base-screen)*100vw)] lg:tw-gap-x-[calc(40.35/var(--base-screen)*100vw)] xl:tw-gap-x-[40.35px]">
      @include('components.featured-card')

      @include('components.featured-card')

      @include('components.featured-card')

      @include('components.featured-card')
    </div>
  </div>
</div>