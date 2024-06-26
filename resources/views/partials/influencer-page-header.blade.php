
<div class="tw-w-full tw-flex tw-flex-col tw-relative tw-pb-5 tw-min-h-[calc((340/var(--base-screen))*100vw)] sm:tw-h-[calc((340/640)*100vw)] md:tw-h-[calc((340/768)*100vw)] lg:tw-h-[calc(700/var(--base-screen)*100vw)] xl:tw-h-[700px] tw-bg-cover tw-bg-no-repeat tw-bg-center" 
  style="background-image: url({{ $influencer_profile->cover_photo ? $influencer_profile->cover_photo : asset('images/backgrounds/profile-cover.png') }});"
>
  <div class="tw-absolute tw-top-0 tw-right-0 tw-left-0 tw-h-full tw-w-full tw-z-0" style="background-color: rgba(0, 0, 0, 50%);"></div>
  <div class="tw-absolute tw-top-0 tw-right-0 tw-left-0 tw-h-full tw-w-full tw-z-0" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.39) 0%, rgba(0, 0, 0, 0) 44%)"></div>
  <div class="tw-absolute tw-top-0 tw-right-0 tw-left-0 tw-h-full tw-w-full tw-z-0" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.50) 0%, rgba(0, 0, 0, 0) 45%)"></div>
  
  <!-- Bread Crumbs -->
  <div class="tw-w-full max-screen tw-relative tw-flex tw-z-10 tw-flex-col tw-mt-[calc(17/var(--base-screen)*100vw)] lg:tw-mt-[calc(46/var(--base-screen)*100vw)] xl:tw-mt-[46px]">
    <div class="tw-relative tw-flex tw-items-center tw-gap-x-5 tw-text-[calc(12/var(--base-screen)*100vw)] lg:tw-text-[calc(17/var(--base-screen)*100vw)] xl:tw-text-[17px] tw-z-20 tw-text-white">
      @foreach($siteBreadcrumbs as $index => $breadcrumb)
        @php($breadcrumb = (object) $breadcrumb)
        @if ($index == 0)
          <a href="{{ $breadcrumb->url }}" class="tw-underline">{{ $breadcrumb->name }}</a>
        @else
          <i class="fas fa-chevron-right tw-text-white lg:tw-text-[calc(18/var(--base-screen)*100vw)] xl:!tw-text-[18px]"></i>
          <a href="{{ $breadcrumb->url }}" class="tw-underline">{{ $breadcrumb->name }}</a>
        @endif
      @endforeach
    </div>

    <!-- Profile Details -->
    <div class="tw-mt-[calc(54/var(--base-screen)*100vw)] lg:tw-mt-[calc(68/var(--base-screen)*100vw)] xl:tw-mt-[68px] tw-flex tw-gap-x-[calc(10/var(--base-screen)*100vw)] lg:tw-gap-x-[calc(65/var(--base-screen)*100vw)]  xl:tw-gap-x-[65px]">
      <div class="tw-aspect-square tw-w-[calc(109.34/var(--base-screen)*100vw)] tw-h-[calc(109.34/var(--base-screen)*100vw)] lg:tw-w-[calc(240.56/var(--base-screen)*100vw)] xl:tw-w-[240.56px] lg:tw-h-[calc(240.56/var(--base-screen)*100vw)] xl:tw-h-[240.56px] tw-rounded-full tw-bg-white">
        <img src="{{ $influencer_profile->avatar ? $influencer_profile->avatar : asset('images/png/profile-placeholder.png') }}" alt="Profile Picture" class="tw-object-cover tw-rounded-full tw-w-full tw-h-full" />
      </div>
      <div class="tw-flex tw-flex-col">
        <div class="tw-flex tw-flex-col tw-w-full">
          <!-- Profile Name -->
          <h2 class="hyphens-auto break-words tw-text-white tw-leading-[calc(33.6/var(--base-screen)*100vw)] lg:tw-leading-none tw-font-agoda-sans-stemless tw-font-[900] tw-text-[calc(28/var(--base-screen)*100vw)] lg:tw-text-[calc(48/var(--base-screen)*100vw)] xl:tw-text-[48px]">
            {!! $influencer_profile->name ?? '' !!}
          </h2>
          <!-- Profile  -->
          <span class="tw-text-white  tw-font-agoda-sans-stemless tw-font-[400] tw-text-[calc(17/var(--base-screen)*100vw)] lg:tw-text-[calc(22/var(--base-screen)*100vw)] xl:tw-text-[22px]">{!! $influencer_profile->influencer_title ?? '' !!}</span>
          <p class="tw-text-white tw-leading-[calc(20.4/var(--base-screen)*100vw)] lg:tw-leading-[calc(33/var(--base-screen)*100vw)] xl:tw-leading-[33px] tw-line-clamp-4 lg:tw-line-clamp-3 tw-font-agoda-sans-stemless tw-font-[400] tw-max-w-[calc(250/var(--base-screen)*100vw)] sm:tw-max-w-[calc(500/var(--base-screen)*100vw)] md:tw-max-w-[calc(700/var(--base-screen)*100vw)] xl:tw-max-w-[830px] tw-mt-[calc(16/var(--base-screen)*100vw)] lg:tw-mt-[calc(25/var(--base-screen)*100vw)] xl:tw-mt-[25px] tw-text-[calc(17/var(--base-screen)*100vw)] lg:tw-text-[calc(22/var(--base-screen)*100vw)] xl:tw-text-[22px]">
            {!! $influencer_profile->description ?? 'Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus.' !!}
          </p>
          <div class="tw-hidden lg:tw-flex tw-mt-[calc(32/var(--base-screen)*100vw)] lg:tw-mt-[calc(23/var(--base-screen)*100vw)] xl:tw-mt-[23px] lg:tw-gap-x-[calc(20/var(--base-screen)*100vw)] xl:tw-gap-x-[20px]">
            @foreach ( $socials as $social )
              <a href="{{ $social['link'] }}" class="tw-bg-[#1C1C1C] tw-rounded-full tw-flex tw-justify-center tw-items-center">
                <img class="hover:tw-opacity-90 tw-rounded-full tw-bg-white tw-object-cover tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="{{ asset('images/svg/'.$social['name'].'.svg') }}">
              </a>
            @endforeach
            {{-- <a href="#"><img class="tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="@asset('images/svg/facebook.svg')"></a>
            <a href="#"><img class="tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="@asset('images/svg/messenger.svg')"></a>
            <a href="#"><img class="tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="@asset('images/svg/x.svg')"></a>
            <a href="#"><img class="tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="@asset('images/svg/linkedin.svg')"></a>
            <a href="#"><img class="tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="@asset('images/svg/line.svg')"></a>
            <a href="#"><img class="tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="@asset('images/svg/whatsapp.svg')"></a>
            <a href="#"><img class="tw-w-[calc(53.21/var(--base-screen)*100vw)] tw-h-[calc(53.21/var(--base-screen)*100vw)] xl:tw-w-[53.21px] xl:tw-h-[53.21px]" src="@asset('images/svg/plus.svg')"></a> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile socials -->
    <div class="tw-w-full tw-flex tw-justify-evenly lg:tw-hidden tw-mt-[calc(27/var(--base-screen)*100vw)] tw-gap-x-[calc(14.87/var(--base-screen)*100vw)] lg:tw-gap-x-[calc(20/var(--base-screen)*100vw)] xl:tw-gap-x-[20px]">
      @foreach ( $socials as $social )
        <a href="{{ $social['link'] }}"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-rounded-full tw-bg-white tw-object-cover tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="{{ asset('images/svg/'.$social['name'].'.svg') }}"></a>
      @endforeach
      {{-- <a href="#"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="@asset('images/svg/facebook.svg')"></a>
      <a href="#"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="@asset('images/svg/messenger.svg')"></a>
      <a href="#"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="@asset('images/svg/x.svg')"></a>
      <a href="#"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="@asset('images/svg/linkedin.svg')"></a>
      <a href="#"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="@asset('images/svg/line.svg')"></a>
      <a href="#"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="@asset('images/svg/whatsapp.svg')"></a>
      <a href="#"><img class="tw-w-[calc(39.55/var(--base-screen)*100vw)] tw-h-[calc(39.55/var(--base-screen)*100vw)]" src="@asset('images/svg/plus.svg')"></a> --}}
    </div>
  </div>
</div>