<div class="tw-relative tw-cursor-pointer hover:tw-opacity-95 tw-bg-white tw-rounded-xl tw-grid tw-grid-rows-[calc((239/var(--base-screen))*100vw)_1fr] lg:tw-grid-rows-[calc((201.7/var(--base-screen))*100vw)_1fr] xl:tw-grid-rows-[201.7px] tw-relative tw-overflow-hidden tw-shadow-lg">
  <div style="background-image: url({{ $you_may_also_like->image }});" class="tw-bg-no-repeat tw-bg-cover tw-relative">
    <!-- Card Image -->
  </div>
  <div class="tw-flex tw-flex-col tw-justify-between tw-p-[calc(20/var(--base-screen)*100vw)]">
    <p class="tw-text-[#2E2D2A] tw-font-[700] tw-text-[calc(21.85/var(--base-screen)*100vw)] xl:tw-text-[21.85px] tw-line-clamp-1">{!! $you_may_also_like->title !!}</p>
    <p class="tw-text-[calc(12/var(--base-screen)*100vw)] lg:tw-text-[calc(17/var(--base-screen)*100vw)] xl:tw-text-[17px] tw-font-[400] tw-text-[#2A2A2E] tw-mt-[calc(21/var(--base-screen)*100vw)] xl:tw-mt-[21px] tw-line-clamp-3">
      {!! $you_may_also_like->excerpt !!}
    </p>
  </div>
  <a href="{{ $you_may_also_like->link }}" class="tw-absolute tw-w-full tw-h-full tw-top-0 tw-right-0"></a>
</div>