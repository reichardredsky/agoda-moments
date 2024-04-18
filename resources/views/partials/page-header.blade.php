<!-- Header Banner -->
<div class="tw-w-full tw-flex tw-flex-col tw-relative tw-h-[calc((283/var(--base-screen))*100vw)] sm:tw-h-[calc((283/640)*100vw)] md:tw-h-[calc((283/768)*100vw)] lg:tw-h-[calc(700/var(--base-screen)*100vw)] xl:tw-h-[700px] tw-bg-cover tw-bg-no-repeat tw-bg-center" style="background-image: url({{ $featured_image ?? asset('images/backgrounds/header-banner.png')}});">
  <div class="tw-absolute tw-top-0 tw-right-0 tw-left-0 tw-h-full tw-w-full tw-z-0" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.7) -8.43%, rgba(0, 0, 0, 0) 29.71%), rgba(0, 0, 0, 0.3);"></div>
  <div class="tw-w-full max-screen tw-relative tw-flex tw-z-10 tw-flex-col">
    <h1 class="tw-mt-[calc(26/var(--base-screen)*100vw)] lg:tw-mt-[calc(48.38/var(--base-screen)*100vw)] xl:tw-mt-[48.38px] tw-text-[calc(28/var(--base-screen)*100vw)] md:tw-text-[calc(28/var(--base-screen)*100vw)] lg:tw-text-[calc(80/var(--base-screen)*100vw)] xl:tw-text-[80px] tw-font-[400] tw-text-white tw-font-agoda-sans-stemless lg:tw-leading-[calc(96/var(--base-screen)*100vw)] xl:tw-leading-[96px]">
      {{ $header_title ?? '' }}
    </h1>
    
    <!-- Bread Crumbs -->
    <div class="tw-flex tw-items-center tw-gap-x-5 tw-text-[calc(12/var(--base-screen)*100vw)] lg:tw-text-[calc(17/var(--base-screen)*100vw)] xl:tw-text-[17px] tw-text-white">
      @foreach($siteBreadcrumbs as $index => $breadcrumb)
        @php($breadcrumb = (object) $breadcrumb)
        @if ($index === 0)
          <a href="{{ $breadcrumb->url }}" class="tw-underline">{{ $breadcrumb->name }}</a>
        @else
          <i class="fas fa-chevron-right tw-text-white lg:tw-text-[calc(18/var(--base-screen)*100vw)] xl:!tw-text-[18px]"></i>
          <a href="{{ $breadcrumb->url }}" class="tw-underline">{{ $breadcrumb->name }}</a>
        @endif
      @endforeach
    </div>
  </div>

  <!-- Search Bar Header -->
  {{-- <section class="tw-hidden lg:tw-flex tw-relative  tw-flex-col tw-items-center tw-w-full tw-z-50 lg:tw-mt-[calc(100/var(--base-screen)*100vw)] xl:tw-mt-[100px]">
    @include('components.search')
  </section> --}}
</div>