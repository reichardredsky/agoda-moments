<div class="tw-relative tw-overflow-hidden tw-rounded-[20px] tw-shadow-agoda tw-grid tw-gap-x-5 lg:tw-grid-cols-[calc(252/var(--base-screen)*100vw)_minmax(0,_1fr)] xl:tw-grid-cols-[252px_minmax(0,_1fr)]">
  <!-- Featured Image -->
  <div class="lg:tw-min-h-[calc(197/var(--base-scren)*100vw)] xl:tw-min-h-[197px] tw-bg-cover tw-bg-no-repeat tw-relative hover:tw-opacity-80 tw-delay-75 tw-transition-opacity" style="background-image: url({{ $you_may_also_like->image }});">
    <a href="{{ $you_may_also_like->link }}" class="tw-absolute tw-right-0 tw-top-0 tw-w-full tw-h-full"></a>
  </div>
  <!-- Featured Details -->
  <div class="tw-flex tw-flex-col tw-py-[30px] lg:tw-gap-y-[0.25vw] xl:tw-gap-y-[5px] tw-pr-5">
    <a href="{{ $you_may_also_like->link }}" class="hover:tw-opacity-80 tw-delay-75 tw-transition-opacity">
      <p class="hyphens-auto hover:tw-underline lg:tw-text-[calc(21.34/var(--base-screen))] xl:tw-text-[21.34px] tw-font-[700] tw-font-agoda-sans-text tw-text-[#2E2D2A] tw-line-clamp-1">{!! $you_may_also_like->title !!}</p>
    </a>
    <p class="tw-text-[#2A2A2E] lg:tw-text-[calc(17/var(--base-screen)*100vw)] xl:tw-text-[17px] lg:tw-leading-[calc(25.5/var(--base-screen)*100vw)] xl:tw-leading-[25.5px] tw-max-w-[calc(220/var(--base-screen)*100vw)] xl:tw-max-w-[220px] tw-line-clamp-3">
      {!! $you_may_also_like->excerpt !!}
    </p>
  </div>
</div>