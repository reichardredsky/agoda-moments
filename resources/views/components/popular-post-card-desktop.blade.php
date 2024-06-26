<div class="tw-relative tw-overflow-hidden tw-rounded-[20px] tw-shadow-agoda tw-grid tw-gap-x-5 lg:tw-grid-cols-[18.9vw_minmax(0,_1fr)] xl:tw-grid-cols-[378px_minmax(0,_1fr)]">
  <!-- Featured Image -->
  <div class="tw-relative lg:tw-min-h-[14.47vw] xl:tw-min-h-[288px] tw-bg-cover tw-bg-no-repeat hover:tw-opacity-80 tw-delay-75 tw-transition-opacity !tw-bg-center" style="background-image: url({{ $post->image ? $post->image : asset('images/svg/image-placeholder.svg') }});">
    <a href="{{ $post->link }}" class="tw-absolute tw-right-0 tw-top-0 tw-w-full tw-h-full"></a>
  </div>
  <!-- Featured Details -->
  <div class="tw-flex tw-flex-col tw-py-[30px] lg:tw-gap-y-[0.25vw] xl:tw-gap-y-[5px]">
    <a href="{{ $post->link }}">
      <p class="hover:tw-opacity-80 tw-delay-75 tw-transition-opacity hover:tw-underline lg:tw-text-[1.6vw] xl:tw-text-[32px] tw-font-[700] tw-font-agoda-sans-text tw-text-[#2E2D2A]">{!! $post->title !!}</p>
    </a>
    <p class="tw-text-[#2A2A2E] lg:tw-text-[0.85vw] xl:tw-text-[17px] lg:tw-leading-[calc(25.5/var(--base-screen)*100vw)] xl:tw-leading-[25.5px] tw-max-w-[calc(1143/var(--base-screen)*100vw)] xl:tw-max-w-[1143px] tw-line-clamp-4">
      {!! $post->excerpt !!}
    </p>
    @include('components.influencer', [
      'name' => $post->influencer_name,
      'date' => $post->date, 
      'influencer_link' => $post->influencer_link,
      'avatar' => $post->influencer_avatar
    ])
  </div>
</div>