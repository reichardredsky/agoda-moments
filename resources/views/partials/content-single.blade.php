<div class="!tw-w-full lg:!tw-min-h-[100vh]">
  <!-- Breadcrumbs -->
  <div class="max-screen !tw-flex !tw-flex-wrap !tw-gap-y-[calc(15/var(--base-screen)*100vw)] lg:!tw-gap-y[20px] !tw-mt-[calc(15/var(--base-screen)*100vw)] lg:!tw-mt-[calc(30/var(--base-screen)*100vw)] xl:!tw-mt-[30px] !tw-flex !tw-items-center !tw-gap-x-5 !tw-text-[calc(12/var(--base-screen)*100vw)] lg:!tw-text-[calc(17/var(--base-screen)*100vw)] xl:!tw-text-[17px] !tw-text-[#434343]">
    @foreach($siteBreadcrumbs as $index => $breadcrumb)
      @php($breadcrumb = (object) $breadcrumb)
      @if ($index == 0)
        <a href="{{ $breadcrumb->url }}" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-gap-x-5 !tw-items-center">
          <span class="!tw-underline">{{ $breadcrumb->name }}</span>
        </a>
      @else
        <div class="tw-flex tw-items-center !tw-gap-x-5">
          <i class="!tw-no-underline fas fa-chevron-right !tw-text-[#434343] lg:!tw-text-[calc(18/var(--base-screen)*100vw)] xl:!!tw-text-[18px]"></i>
          <a href="{{ $breadcrumb->url }}" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-items-center">
            <span class="!tw-underline">{{ $breadcrumb->name }}</span>
          </a>
        </div>
      @endif
    @endforeach
  </div>

  <!-- Content Section -->
  <div class="max-screen lg:!tw-mt-[calc(36/var(--base-screen)*100vw)] xl:!tw-mt-[36px] !tw-grid lg:!tw-gap-x-[calc(34/var(--base-screen)*100vw)] xl:!tw-gap-x-[34px] lg:!tw-grid-cols-[1fr_calc(515/var(--base-screen)*100vw)] xl:!tw-grid-cols-[1fr_512px] w-full">
    <div class="!tw-flex !tw-flex-col">
      <div class="!tw-flex !tw-py-[calc(19/var(--base-screen)*100vw)] lg:!tw-py-[calc(20/var(--base-screen)*100vw)] xl:!tw-py-[20px] !tw-border-b-[#DDDDDD] !tw-border-b-[1px]">
        @include('components.influencer', [
          'name' => $influencer_author->name,
          'avatar' => $influencer_author->avatar,
          'influencer_link' => $influencer_author->link,
          'date' => $influencer_author->date,
          'is_show_date' => false
        ])
      </div>
      <!-- Content Titles -->
      <h1 class="hyphens-auto !tw-my-[calc(30/var(--base-screen)*100vw)] lg:!tw-my-[calc(42/var(--base-screen)*100vw)] xl:!tw-my-[42px] !tw-text-[#2A2A2E] !tw-font-[400] !tw-font-agoda-sans-stemless !tw-text-[calc(28/var(--base-screen)*100vw)] lg:!tw-text-[calc(48/var(--base-screen)*100vw)] xl:!tw-text-[48px]">
        {!! $title !!}
      </h1>

      <article class="Bootstrap">
        {!! the_content() !!}
      </article>

      <div class="!tw-flex !tw-flex-column !tw-justify-center lg:!tw-justify-start !tw-items-center tw-gap-x-[10px] !tw-mt-[calc(26/var(--base-screen)*100vw)] lg:!tw-mt-[calc(28/var(--base-screen)*100vw)] xl:!tw-mt-[28px] !tw-border-t !tw-border-t-[#00000040] !tw-pt-[calc(23/var(--base-screen)*100vw)] lg:!tw-pt-[calc(45/var(--base-screen)*100vw)] xl:!tw-pt-[45px]">
        <i class="fa-solid fa-share-nodes tw-text-[25px]"></i>
        {!! $social_share !!}
      </div>
    </div>

    <!-- You may also like -->
    <div class="!tw-hidden lg:!tw-block">
      <h2 class="!tw-text-[#2A2A2E] !tw-font-[400] !tw-font-agoda-sans-stemless !tw-text-[calc(28/var(--base-screen)*100vw)] lg:!tw-text-[calc(48/var(--base-screen)*100vw)] xl:!tw-text-[48px]">{!! __('You may also like', 'moments') !!}</h2>
      <div class="lg:!tw-mt-[calc(38/var(--base-screen)*100vw)] xl:!tw-mt-[38px] !tw-flex !tw-flex-col lg:!tw-gap-y-[1.5vw] xl:!tw-gap-y-[30px]">
        @foreach ( $you_may_also_likes as $you_may_also_like )
          @include('components.you-may-also-like-card-horizontal', ['you_may_also_like' => $you_may_also_like])
        @endforeach
      </div>
    </div>
  </div>

  <!-- Mobile -->
  <div class="lg:!tw-hidden lg:!tw-mt-[calc(38/var(--base-screen)*100vw)] xl:!tw-mt-[38px] !tw-flex !tw-flex-col lg:!tw-gap-y-[1.5vw] xl:!tw-gap-y-[30px]">
  @include('partials.you-may-also-like', ['you_may_also_likes' => $you_may_also_likes])
  </div>
</div>