      <!-- Popular posts Desktop -->
<div class="max-screen tw-mx-auto tw-mt-[3%] tw-flex-col tw-hidden lg:tw-flex">
  <div class="tw-relative tw-w-full">
    <p class="tw-font-agoda-sans-stemless tw-my-[calc(30/var(--base-screen)*100vw)] lg:tw-my-0 tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] lg:tw-mb-[calc((38/var(--base-screen))*100vw)] xl:tw-mb-[38px] tw-text-[#2A2A2E]">Popular posts</p>
    <div class="tw-flex tw-flex-col lg:tw-gap-y-[1.5vw] xl:tw-gap-y-[30px]">
      <!-- Card 1 -->
      @include('components.popular-post-card-desktop')

      @include('components.popular-post-card-desktop')
      
      @include('components.popular-post-card-desktop')

      @include('components.popular-post-card-desktop')

      @include('components.popular-post-card-desktop')

      @include('components.popular-post-card-desktop')

      @include('components.popular-post-card-desktop')
    </div>
  </div>
</div>

<!-- Popular posts Tab/Mobile -->
<div class="max-screen tw-mx-auto tw-mt-[3%] tw-flex-col tw-flex lg:tw-hidden">
  <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-[minmax(0,_1fr)_26.18vw] xl:tw-grid-cols-[minmax(0,_1fr)_512px] tw-gap-x-[1.5vw] xl:tw-gap-x-[30px]">
    <div class="tw-relative">
        <!-- Popular posts -->
      <p class="tw-font-agoda-sans-stemless tw-my-[calc(30/var(--base-screen)*100vw)] lg:tw-my-0 tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] lg:tw-mb-[calc((38/var(--base-screen))*100vw)] xl:tw-mb-[38px] tw-text-[#2A2A2E]">Popular posts</p>
      <div class="tw-flex">
        <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-[calc(30/var(--base-screen)*100vw)]">
          @include('components.popular-post-card-mobile')

          @include('components.popular-post-card-mobile')

          @include('components.popular-post-card-mobile')

          @include('components.popular-post-card-mobile')

          @include('components.popular-post-card-mobile')

          @include('components.popular-post-card-mobile')

          @include('components.popular-post-card-mobile')
        </div>
      </div>
    </div>
  </div>
</div>