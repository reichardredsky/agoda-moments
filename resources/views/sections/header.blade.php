<header class="tw-flex tw-w-full tw-relative tw-bg-white lg:tw-h-[calc(84/var(--base-screen)*100vw)] xl:tw-h-[84px] tw-border-b-[#E1E1E1] tw-border-b">
  <nav class="tw-w-full max-screen tw-my-auto lg:tw-mx-auto tw-py-[calc(26.5/var(--base-screen)*100vw)] lg:tw-p-0">
    <ul class="tw-flex tw-justify-between lg:tw-justify-start tw-gap-x-[40px] tw-items-center xl:tw-p-4 comfortaa-font">
      <li class="lg:tw-hidden">
        <img class="tw-h-[18.5px] tw-w-auto" src="@asset('images/svg/menu.svg')" />
      </li>
      <li class="lg:tw-hidden tw-w-full">
        @include('components.search')
      </li>
      <li class="lg:tw-ml-0">
        <a href="#" class="tw-text-gray-900 tw-no-underline tw-text-lg tw-font-bold">
          <img src="https://www.agoda.com/wp-content/themes/agoda-travel-guides/dist/images/agoda-logo_688a8f9e.svg" alt="Agoda Moments" class="tw-w-auto tw-h-[calc((32/var(--base-screen))*100vw)] md:tw-h-[calc((32/1023)*100vw)] lg:tw-h-[calc(32/var(--base-screen)*100vw)] xl:tw-h-[32px]" />
        </a>
      </li>
      <li class="tw-hidden lg:tw-block">
        <ul class="tw-flex tw-items-center">
          <li>
            <a href="#" class="tw-text-[#404040] lg:tw-text-[calc(12.53/var(--base-screen)*100vw)] xl:tw-text-[12.53px] tw-no-underline tw-text-lg tw-mx-2">Rooms</a>
          </li>
          <li>
            <a href="#" class="tw-text-[#404040] lg:tw-text-[calc(12.53/var(--base-screen)*100vw)] xl:tw-text-[12.53px] tw-no-underline tw-text-lg tw-mx-2">Flights</a>
          </li>
          <li>
            <a href="#" class="tw-text-[#404040] lg:tw-text-[calc(12.53/var(--base-screen)*100vw)] xl:tw-text-[12.53px] tw-no-underline tw-text-lg tw-mx-2">Today’s deals</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>