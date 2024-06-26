<header class="tw-flex tw-w-full tw-relative tw-bg-white lg:tw-h-[calc(84/var(--base-screen)*100vw)] xl:tw-h-[84px] tw-border-b-[#E1E1E1] tw-border-b">
  <nav class="tw-w-full max-screen tw-my-auto lg:tw-mx-auto tw-py-[calc(26.5/var(--base-screen)*100vw)] lg:tw-p-0">
    <ul class="tw-flex tw-justify-between lg:tw-justify-start tw-gap-x-[40px] tw-items-center xl:tw-p-4 !tw-m-0 comfortaa-font">
      <li class="lg:tw-hidden">
        <img class="sidebar-toggle tw-h-[18.5px] tw-w-auto" src="@asset('images/svg/menu.svg')" />
      </li>
      <li class="lg:tw-hidden tw-w-full">
        @include('components.search')
      </li>
      <li class="lg:tw-ml-0">
        <a href="#" class="tw-text-gray-900 tw-no-underline tw-text-lg tw-font-bold">
          <img src="https://www.agoda.com/wp-content/themes/agoda-travel-guides/dist/images/agoda-logo_688a8f9e.svg" alt="Agoda Moments" class="tw-w-auto tw-h-[calc((32/var(--base-screen))*100vw)] md:tw-h-[calc((32/1023)*100vw)] lg:tw-h-[calc(32/var(--base-screen)*100vw)] xl:tw-h-[32px]" />
        </a>
      </li>
      <li class="tw-hidden lg:tw-block tw-mr-auto">
        <ul class="toggle-serarch-hide tw-flex tw-items-center tw-gap-x-[calc(36/var(--base-screen)*100vw)] xl:tw-gap-x-[36px]">
          @if(count($menu_items))
            @foreach($menu_items as $item)
            <li>
              <a href="{{ $item->url }}" class="tw-text-[#404040] lg:tw-text-[calc(16/var(--base-screen)*100vw)] xl:tw-text-[16px] tw-no-underline tw-text-lg">{{ $item->title }}</a>
            </li>
            @endforeach
          @else
            <li>
              <a href="#" class="tw-text-[#404040] lg:tw-text-[calc(16/var(--base-screen)*100vw)] xl:tw-text-[16px] tw-no-underline tw-text-lg">Rooms</a>
            </li>
            <li>
              <a href="#" class="tw-text-[#404040] lg:tw-text-[calc(16/var(--base-screen)*100vw)] xl:tw-text-[16px] tw-no-underline tw-text-lg">Flights</a>
            </li>
            <li>
              <a href="#" class="tw-text-[#404040] lg:tw-text-[calc(16/var(--base-screen)*100vw)] xl:tw-text-[16px] tw-no-underline tw-text-lg">Today’s deals</a>
            </li>
          @endif
          
        </ul>
      </li>
      @if(is_tax('influencer'))
      <li class="tw-hidden lg:tw-block">
        <div class="tw-flex tw-relative tw-items-center tw-gap-x-[calc(23/var(--base-screen)*100vw)] xl:tw-gap-x-[23px]">
          <img draggable="false" class="lg:tw-w-[calc(32.1/var(--base-screen)*100vw)] lg:tw-h-[calc(32.1/var(--base-screen)*100vw)] xl:tw-w-[32.1px] xl:tw-h-[32.1px]" src="@asset('images/svg/search_outline.svg')" />
          <div class="tw-flex tw-flex-col tw-w-full tw-relative">
            <input class="toggle-search tw-w-[calc(266/var(--base-screen)*100vw)] xl:tw-w-[266px] tw-font-[400] tw-border-0 lg:tw-text-[calc(16/var(--base-screen)*100vw)] xl:tw-text-[16px] placeholder:tw-text-[#2A2A2E] tw-text-[#2A2A2E] placeholder:tw-font-agoda-sans-text placeholder:tw-font-[400] placeholder:tw-text-[calc(16/var(--base-screen)*100vw)] xl:placeholder:tw-text-[16px] tw-outline-none tw-text-start focus:tw-ring-0" placeholder="Explore Country, City guides" />
            <div class="toggle-search-result tw-hidden tw-w-full tw-absolute tw-bg-white tw-z-[999] tw-mt-[calc(57/var(--base-screen)*100vw)] xl:tw-mt-[57px]">
              <ul>
                <li class="tw-p-2 hover:tw-bg-[#fcdfcf] hover:tw-cursor-pointer">
                  <a href="#" class="tw-text-[calc(12/var(--base-screen)*100vw)] xl:tw-text-[12px] tw-w-full tw-flex tw-gap-x-[8px]">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Bangkok Thailand</span></a>
                  </a>
                </li>

                <li class="tw-p-2 hover:tw-bg-[#fcdfcf] hover:tw-cursor-pointer">
                  <a href="#" class="tw-text-[calc(12/var(--base-screen)*100vw)] xl:tw-text-[12px] tw-w-full tw-flex tw-gap-x-[8px]">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Bangkok Thailand</span></a>
                  </a>
                </li>

                <li class="tw-p-2 hover:tw-bg-[#fcdfcf] hover:tw-cursor-pointer">
                  <a href="#" class="tw-text-[calc(12/var(--base-screen)*100vw)] xl:tw-text-[12px] tw-w-full tw-flex tw-gap-x-[8px]">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Bangkok Thailand</span></a>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <button class="toggle-close-btn tw-hidden tw-absolute tw-right-0 tw-w-[20px] tw-h-[20px]">
            <i class="fa-regular fa-circle-xmark"></i>
          </button>
        </div>
      </li>
      @endif
      <li class="tw-cursor-pointer open-modal-btn tw-hidden lg:tw-block {{ is_tax('influencer') ? '' : 'tw-ml-auto' }}">
        <img draggable="false" class="tw-w-auto lg:tw-h-[calc(20.1/var(--base-screen)*100vw)] xl:tw-h-[20.1px]" src="{{ $current_language['country_flag_url'] }}" />
      </li>
    </ul>
  </nav>
</header>

  
<aside id="sidebar" class="sm:tw-hidden tw-absolute tw-z-[100] tw-left-0 tw-z-[1000] tw-min-w-[240px] tw-max-w-[440px] tw-w-[80%] tw-h-screen tw-transition-transform -tw-translate-x-full tw-top-0" aria-label="Sidebar">
  <div class="tw-flex tw-flex-col tw-h-full tw-overflow-y-auto tw-bg-gray-50 dark:tw-bg-gray-800">
      <div class="tw-flex" style="height: calc(44px * 4); background-image: url('https://cdn6.agoda.net/images/mvc/phone/menu/menu-header.jpg'); background-size: 100vw; background-position: 50%;">
          <img class="tw-w-[56px] tw-h-[25px]" style="margin: 24px auto;" src="https://agoda.com/wp-content/themes/agoda-travel-guides/dist/images/agoda-logo-white_db509243.svg" />
      </div>

      <div class="tw-w-full tw-flex">
        <ul class="tw-grid tw-grid-cols-3 tw-justify-items-center tw-w-full tw-border-b-2">
            <li data-te-nav-item-ref>
              <a
                class="tw-block tw-text-[13px] tw-py-[12px] tw-px-[16px] tw-font-bold tw-transition tw-duration-150 tw-ease-in-out !tw-text-gray-700 hover:!tw-text-[#2ea3f2]"
                href="#"
              >
              Rooms
              </a>
            </li>
            <li data-te-nav-item-ref>
              <a
                class="tw-block tw-text-[13px] tw-py-[12px] tw-px-[16px] tw-font-bold tw-transition tw-duration-150 tw-ease-in-out !tw-text-gray-700 hover:!tw-text-[#2ea3f2]"
                href="#"
              >
              Flights
              </a>
            </li>
            <li data-te-nav-item-ref>
              <a
                class="tw-block tw-text-[13px] tw-py-[12px] tw-px-[16px] tw-font-bold tw-transition tw-duration-150 tw-ease-in-out !tw-text-gray-700 hover:!tw-text-[#2ea3f2]"
                href="#"
              >
              Today's deals
              </a>
            </li>
        </ul>
      </div>
      
      <div class="tw-flex tw-flex-col tw-w-full tw-p-5 tw-mt-3 tw-border-b-2">
        <h4 class="tw-text-[#999999] tw-font-thin tw-text-[12px]">Settings</h4>
        <button class="open-modal-btn tw-flex tw-gap-x-5 tw-items-center">
          <span class="">Language</span>
          <img src="{{ $current_language['country_flag_url'] }}" class="header__language-flag">
        </button>
      </div>
  </div>
</aside>

<div id="modalContent" class="tw-absolute tw-hidden tw-z-[999] tw-top-0 tw-left-0 tw-right-0 tw-w-full tw-h-full tw-justify-center tw-items-center">
  <div class="containerContenet tw-relative tw-w-full tw-h-full tw-bg-white tw-max-w-[80%] tw-max-h-[80%] lg:tw-max-h-[calc(502/var(--base-screen)*100vw)] lg:tw-max-w-[calc(800/var(--base-screen)*100vw)] xl:tw-max-w-[800px] xl:tw-max-h-[502px]">
    <div class="tw-flex tw-flex-col tw-w-full">
      <h4 class="tw-uppercase tw-px-[26px] tw-py-[14px] tw-bg-gray-100 tw-text-[12px] tw-text-gray-500">Current language</h4>
       <div class="tw-w-full tw-px-5 tw-py-3">
       @foreach(array_filter($site_languages, function($item) {
        return $item['active'];
       }) as $lang)
        <div class="tw-flex tw-items-center tw-gap-x-2 tw-px-2 tw-border-l-8 tw-border-l-blue-500">
          <img src="{{ $lang['country_flag_url'] }}" class="tw-w-[20px] tw-h-[20px]" />
          <span class="tw-text-[#2A2A2E] tw-text-[16px] tw-font-agoda-sans-text tw-font-[400]">{{ $lang['translated_name'] }}</span>
        </div>
        @endforeach
       </div>
      <h4 class="tw-uppercase tw-px-[26px] tw-py-[14px] tw-bg-gray-100 tw-text-[12px] tw-text-gray-500">All languages</h4>
      <div class="tw-w-full tw-px-5 tw-py-3">
        @foreach($site_languages as $lang)
          <a href="{{ $lang['url'] }}" class="tw-flex tw-items-center tw-gap-x-2 tw-my-2 tw-px-2 {{ $lang['active'] ? 'tw-border-l-8 tw-border-l-blue-500' : 'tw-border-l-8 tw-border-l-white' }}">
            <img src="{{ $lang['country_flag_url'] }}" class="tw-w-[20px] tw-h-[20px]" />
            <span class="tw-text-[#2A2A2E] tw-text-[16px] tw-font-agoda-sans-text tw-font-[400]">{{ $lang['translated_name'] }}</span>
          </a>
        @endforeach
       </div>
    </div>
    <button class="close-btn tw-absolute -tw-top-[30px] tw-right-[10px] tw-text-white">X</button>
  </div>
</div>