<div class="tw-bg-white tw-rounded-xl tw-grid tw-grid-rows-[calc((233.77/var(--base-screen))*100vw)_1fr] tw-relative tw-overflow-hidden tw-shadow-lg">
  <div style="background-image: url({{ $post->image ? $post->image : asset('images/svg/image-placeholder.svg') }});" class="tw-bg-no-repeat tw-bg-cover tw-relative !tw-bg-center">
    <a href="{{ $post->link }}" class="tw-absolute tw-right-0 tw-top-0 tw-w-full tw-h-full"></a>
  </div>
  <div class="tw-flex tw-flex-col tw-justify-between tw-p-[calc(20/var(--base-screen)*100vw)]">
    <a href="{{ $post->link }}">
      <p class="hover:tw-underline tw-text-[#2E2D2A] tw-font-[700] tw-text-[calc(22/var(--base-screen)*100vw)]">{!! $post->title !!}</p>
    </a>
    <p class="tw-text-[calc(12/var(--base-screen)*100vw)] tw-font-[400] tw-text-[#2A2A2E] tw-mt-[calc(20/var(--base-screen)*100vw)] xl:tw-mt-[21px] tw-line-clamp-3">
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