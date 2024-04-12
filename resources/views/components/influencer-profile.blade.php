<div class="tw-flex tw-flex-col tw-gap-[calc(5/var(--base-screen)*100vw)] lg:tw-gap-[calc(12/var(--base-screen)*100vw)] xl:tw-gap-[12px]">
  <a class="tw-relative hover:tw-opacity-95" href="{{ $link }}">
    <div class="tw-relative tw-flex tw-aspect-[375/360] tw-w-full tw-items-end tw-rounded-2xl tw-bg-cover tw-bg-no-repeat tw-drop-shadow-lg tw-overflow-hidden !tw-bg-center" style="background-image: url({{ $profile_url ? $profile_url : asset('images/png/profile-placeholder.png') }});">
      <div class="tw-w-full tw-h-full tw-z-0 tw-bg-[linear-gradient(180deg,_rgba(0,0,0,0)_47.35%,_rgba(0,0,0,0.75)_100%)]"></div>
    </div>
  </a>
  <a class="tw-relative hover:tw-opacity-95" href="{{ $link }}">
    <div class="tw-relative tw-flex tw-flex-col tw-text-[#2A2A2E] tw-font-[400] tw-pr-3 tw-mt-[calc(10/var(--base-screen)*100vw)] lg:tw-mt-0 lg:tw-gap-y-[calc(2/var(--base-screen)*100vw)] tw-line-clamp-3 ">
      <span class="tw-text-[calc(17/var(--base-screen)*100vw)] lg:tw-text-[calc(22.79/var(--base-screen)*100vw)] xl:tw-text-[22.79px] tw-text-[#2E2D2A] tw-font-agoda-sans-stemless tw-font-[900]">
        {!! $name !!}
      </span>
      <p class="tw-line-clamp-3 tw-text-[calc(14/var(--base-screen)*100vw)] lg:tw-text-[calc(17/var(--base-screen)*100vw)] xl:tw-text-[17px]">{!! $description !!}</p>
    </div>
  </a>
</div>