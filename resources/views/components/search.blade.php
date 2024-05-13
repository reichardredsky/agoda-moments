<div class="search-input tw-w-full">
  <div class="tw-flex tw-h-[calc(30/var(--base-screen)*100vw)] lg:tw-h-[calc(68/var(--base-screen)*100vw)] xl:tw-h-[68px] tw-mx-auto tw-max-w-[calc(205/var(--base-screen)*100vw)] md:tw-max-w-[calc(300/var(--base-screen)*100vw)] lg:tw-max-w-[calc((700/1990)*100vw)] xl:tw-max-w-[700px] tw-overflow-hidden ptw-x-5 tw-w-full tw-items-center tw-bg-white tw-rounded-full tw-relative tw-z-[51] tw-shadow-[0px_0px_1px_0px_rgba(0,0,0,0.35)] lg:tw-shadow-[0px_0px_52px_rgba(0,0,0,0.35)]">
    <input
      id="searchBarField"
      class="tw-hidden lg:tw-block tw-text-[calc((12/var(--base-screen))*100vw)] lg:tw-text-[calc((28/var(--base-screen))*100vw)] xl:tw-text-[28px] tw-text-[#2A2A2E] tw-h-[calc(18/var(--base-screen))*100vw] lg:tw-h-[calc(42/var(--base-screen))*100vw] xl:tw-h-[42px] tw-w-full tw-outline-none tw-text-center tw-opacity-50 focus:tw-ring-0"
      {{-- autocomplete="on"
      aria-autocomplete="inline"
      list="suggestion" --}}
      placeholder="Explore Country, City guides"
    />
    <input
      id="searchBarFieldMobile"
      class="lg:tw-hidden tw-text-[calc((12/var(--base-screen))*100vw)] lg:tw-text-[calc((28/var(--base-screen))*100vw)] xl:tw-text-[28px] tw-text-[#2A2A2E] tw-h-[calc(18/var(--base-screen))*100vw] lg:tw-h-[calc(42/var(--base-screen))*100vw] xl:tw-h-[42px] tw-w-full tw-outline-none tw-text-center tw-opacity-50 focus:tw-ring-0"
      autocomplete="on"
      aria-autocomplete="inline"
      list="suggestion"
      placeholder="Explore Country, City"
    />
    <button data-modal-target="searchOnModal" data-modal-show="searchOnModal" class="tw-absolute tw-bg-[#5392F9] tw-rounded-full tw-right-[calc(3.54/var(--base-screen)*100vw)] lg:tw-right-[calc(8/var(--base-screen)*100vw)] xl:tw-right-[8px] tw-flex tw-items-center tw-justify-center tw-h-[calc(24.8/var(--base-screen)*100vw)] tw-w-[calc(24.8/var(--base-screen)*100vw)] lg:tw-w-[calc(56/var(--base-screen)*100vw)] xl:tw-h-[56px] lg:tw-h-[calc(56/var(--base-screen)*100vw)] xl:tw-w-[56px]">
      <i class="fas fa-search tw-text-white tw-text-[calc(17.69/var(--base-screen)*100vw)] lg:tw-text-[calc(35/var(--base-screen)*100vw)] xl:tw-text-[35px]"></i>
    </button>
  </div>
  @include('components.search-result-container')
</div>