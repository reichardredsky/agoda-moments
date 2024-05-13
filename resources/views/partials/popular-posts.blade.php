<!-- Popular posts Desktop -->
<div class="max-screen tw-mx-auto lg:tw-mt-[calc(54/var(--base-screen)*100vw)] xl:tw-mt-[54px] tw-flex-col tw-hidden lg:tw-flex">
  <div class="tw-relative tw-w-full">
    <div class="tw-flex tw-justify-between tw-items-start">
      <h2 class="tw-font-agoda-sans-stemless tw-my-[calc(30/var(--base-screen)*100vw)] lg:tw-my-0 tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] lg:tw-mb-[calc((54/var(--base-screen))*100vw)] xl:tw-mb-[38px] tw-text-[#2A2A2E]">
        {!! $title !!}
      </h2>
      @if( isset($categories) && count($categories) > 0 )
        <div id="dropdown-collapse" class="tw-relative tw-flex tw-flex-col tw-w-full lg:tw-max-w-[calc((438/var(--base-screen))*100vw)] xl:tw-max-w-[438px]">
          <button class="dropdown-trigger tw-flex tw-justify-between lg:tw-px-[calc(33/var(--base-screen)*100vw)] lg:tw-py-[calc(16/var(--base-screen)*100vw)] xl:tw-py-[19px] xl:tw-px-[33px] tw-shadow-[0px_0px_4px_0px_#0000001F] tw-text-[#5392F9] tw-bg-white-700 hover:tw-bg-white-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-blue-300 tw-font-medium tw-rounded-[999px] tw-text-[calc(28/var(--base-screen)*100vw)] xl:tw-text-[28px]
            tw-text-center tw-inline-flex tw-items-center" type="button">
              @if ( isset($_GET['filter']))
                <value>{{{ ucfirst($_GET['filter']) }}}</value>
              @else 
                <value>{!! __($filter_label, 'moments') !!}</value>
              @endif
              <span class="tw-ml-2 tw-text-[#666666]">
                <svg class="tw-w-[18px] tw-h-[18px] tw-ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>  
              </span>
          </button>
          <div class="dropdown-menu tw-hidden tw-relative">
              <ul class="tw-flex tw-flex-col tw-bg-white tw-w-full tw-absolute tw-z-40 tw-shadow-xl tw-mt-5 tw-rounded-xl">
                <li class="hover:tw-bg-gray-50">
                  <a onclick="appendToUrl('/')" href="#" class="tw-w-full tw-text-[#5392F9] tw-text-[calc(18/var(--base-screen)*100vw)] xl:tw-text-[28px] tw-font-medium tw-py-[calc(12/var(--base-screen)*100vw)] tw-px-[calc(27/var(--base-screen)*100vw)] tw-text-center tw-inline-flex tw-items-center">
                    {!! __($filter_label, 'moments') !!}
                  </a>
                </li>
                @foreach ( $categories as $category )
                  <li class="hover:tw-bg-gray-50">
                    <a onclick="appendToUrl('{{ $category->slug }}')" href="#" class="tw-w-full tw-text-[#5392F9] tw-text-[calc(18/var(--base-screen)*100vw)] xl:tw-text-[28px] tw-font-medium tw-py-[calc(12/var(--base-screen)*100vw)] tw-px-[calc(27/var(--base-screen)*100vw)] tw-text-center tw-inline-flex tw-items-center">
                      {{ $category->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
           </div>
        </div>
      @endif
    </div>
    <div class="tw-flex tw-flex-col lg:tw-gap-y-[1.5vw] xl:tw-gap-y-[30px]">
      @if ( count($posts) > 0 )
        @foreach ( $posts as $post )
          @include('components.popular-post-card-desktop', ['post' => $post])
        @endforeach
      @else 
        <p class="tw-text-[#2E2D2A] tw-font-[400] tw-text-[calc(21.85/var(--base-screen)*100vw)] xl:tw-text-[21.85px] tw-line-clamp-1">
          {{ __('No travel tips found.', 'moments') }}
        </p>
      @endif
    </div>
  </div>
</div>

<!-- Popular posts Tab/Mobile -->
<div class="max-screen tw-mx-auto tw-flex-col tw-flex lg:tw-hidden">
  @if ( count($posts) > 0 )
  <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-[minmax(0,_1fr)_26.18vw] xl:tw-grid-cols-[minmax(0,_1fr)_512px] tw-gap-x-[1.5vw] xl:tw-gap-x-[30px]">
    <div class="tw-relative">
        <!-- Popular posts -->
      
      <div class="tw-relative tw-flex tw-flex-col tw-my-[calc(30/var(--base-screen)*100vw)] lg:tw-my-0 tw-gap-y-[calc(30/var(--base-screen)*100vw)]">
        <h2 class="tw-font-agoda-sans-stemless tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] lg:tw-mb-[calc((38/var(--base-screen))*100vw)] xl:tw-mb-[38px] tw-text-[#2A2A2E]">
          {!! $title !!}
        </h2>
        @if( isset($categories) && count($categories) > 0 )
          <div id="dropdown-collapse-mobile" class="tw-relative tw-flex tw-flex-col tw-w-full lg:tw-max-w-[calc((438/var(--base-screen))*100vw)] xl:tw-max-w-[438px]">
            <button  class="dropdown-trigger tw-flex tw-justify-between tw-px-[calc(27/var(--base-screen)*100vw)] tw-py-[calc(12/var(--base-screen)*100vw)] tw-shadow-[0px_0px_4px_0px_#0000001F] tw-text-[#5392F9] tw-bg-white-700 hover:tw-bg-white-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-blue-300 tw-font-medium tw-rounded-[999px] tw-text-[calc(18/var(--base-screen)*100vw)] xl:tw-text-[28px]
              tw-text-center tw-inline-flex tw-items-center" type="button">
                @if ( isset($_GET['filter']))
                  <value>{{{ ucfirst($_GET['filter'])  }}}</value>
                @else 
                  <value>{!! __($filter_label, 'moments') !!}</value>
                @endif
                <span class="tw-ml-2 tw-text-[#666666]">
                  <svg class="tw-w-[18px] tw-h-[18px] tw-ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>  
                </span>
            </button>
            <div class="dropdown-menu tw-hidden tw-relative">
              <ul class="tw-flex tw-flex-col tw-bg-white tw-w-full tw-absolute tw-z-40 tw-shadow-xl tw-mt-5 tw-rounded-xl">
                <li class="hover:tw-bg-gray-50">
                  <a onclick="appendToUrl('/')" href="#" class="tw-w-full tw-text-[#5392F9] tw-text-[calc(18/var(--base-screen)*100vw)] xl:tw-text-[28px] tw-font-medium tw-py-[calc(12/var(--base-screen)*100vw)] tw-px-[calc(27/var(--base-screen)*100vw)] tw-text-center tw-inline-flex tw-items-center">
                    {!! __($filter_label, 'moments') !!}
                  </a>
                </li>
                @foreach ( $categories as $category )
                  <li class="hover:tw-bg-gray-50">
                    <a onclick="appendToUrl('{{ $category->slug }}')" href="#" class="tw-w-full tw-text-[#5392F9] tw-text-[calc(18/var(--base-screen)*100vw)] xl:tw-text-[28px] tw-font-medium tw-py-[calc(12/var(--base-screen)*100vw)] tw-px-[calc(27/var(--base-screen)*100vw)] tw-text-center tw-inline-flex tw-items-center">
                      {{ $category->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
           </div>
          </div>
        @endif
      </div>
      
      <div class="tw-flex">
        <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-[calc(30/var(--base-screen)*100vw)]">
          @foreach ( $posts as $post )
            @include('components.popular-post-card-mobile', ['post' => $post])
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @else 
    <p class="tw-text-[#2E2D2A] tw-text-center tw-font-[400] tw-text-[calc(21.85/var(--base-screen)*100vw)] xl:tw-text-[21.85px] tw-line-clamp-1">
      {{ __('No Popular travel tips found.', 'moments') }}
    </p>
  @endif
</div>

<script>

  function appendToUrl( url )
  {
    const parser = new URL(window.location);
    if ( url == '/') {
      parser.searchParams.delete('filter');
      window.location = parser.href;
    } else {
      parser.searchParams.set('filter', url);
    
      window.location = parser.href;
    }
  }

</script>