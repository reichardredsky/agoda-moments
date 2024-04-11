<div class="tw-bg-white tw-rounded-[calc(26.32/var(--base-screen)*100vw)] lg:tw-rounded-[calc(20.07/var(--base-screen)*100vw)] xl:tw-rounded-[20.07px] !tw-grid tw-grid-rows-[calc((238/var(--base-screen))*100vw)_1fr] lg:tw-grid-rows-[calc((337/var(--base-screen))*100vw)_1fr] xl:tw-grid-rows-[337px_1fr] tw-relative tw-overflow-hidden tw-shadow-[0px_3.147266149520874px_18px_0px_#0000001A] lg:tw-shadow-[0px_4px_18px_0px_rgba(0,0,0,0.1)]">
  <div
      style="background: linear-gradient(180deg, rgba(0, 0, 0, 0) 52.69%, rgba(0, 0, 0, 0.75) 100%),  {{ $image ? 'url('.$image.')' : 'url('.asset('images/svg/image-placeholder.svg').')' }};" 
      class="!tw-bg-no-repeat !tw-bg-cover tw-relative !tw-bg-center"
  >
    <a href="{{ $link }}" class="tw-absolute tw-bottom-[calc(19.5/var(--base-screen)*100vw)] lg:tw-bottom-[calc(26.73/var(--base-screen)*100vw)] xl:tw-bottom-[26.73px]">
      <p class="hyphens-auto hover:tw-underline tw-text-[calc(22/var(--base-screen)*100vw)] lg:tw-text-[calc(32.12/var(--base-screen)*100vw)] xl:tw-text-[32.12px] tw-text-white tw-font-[700] tw-px-5 tw-line-clamp-1">
        {!! $title !!}
      </p>
    </a>
  </div>
  <div class="tw-flex tw-flex-col tw-justify-between tw-py-[30px] tw-px-[20px]">
    <p class="tw-text-[calc(15/var(--base-screen)*100vw)] lg:tw-text-[calc(17/var(--base-screen)*100vw)] xl:tw-text-[17px] tw-font-[400] tw-text-[#2A2A2E] tw-line-clamp-3">
      {!! $excerpt !!}
    </p>
    @include('components.influencer', ['name' => $influencer->name, 'avatar' => $influencer->avatar, 'influencer_link' => $influencer->link])
  </div>
</div>