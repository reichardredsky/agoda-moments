{{--<article @php(post_class('h-entry'))>
  <header>
    <h1 class="p-name">
      {!! $title !!}
    </h1>

    @include('partials.entry-meta')
  </header>

  <div class="e-content">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

  @php(comments_template())
</article>
--}}

<div class="!tw-w-full lg:!tw-min-h-[100vh]">
  <!-- Breadcrumbs -->
  <!-- Bread Crumbs -->
  <div class="max-screen !tw-flex !tw-flex-wrap !tw-gap-y-[calc(15/var(--base-screen)*100vw)] lg:!tw-gap-y[20px] !tw-mt-[calc(15/var(--base-screen)*100vw)] lg:!tw-mt-[calc(30/var(--base-screen)*100vw)] xl:!tw-mt-[30px] !tw-flex !tw-items-center !tw-gap-x-5 !tw-text-[calc(12/var(--base-screen)*100vw)] lg:!tw-text-[calc(17/var(--base-screen)*100vw)] xl:!tw-text-[17px] !tw-text-[#434343]">
    <a href="#" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-gap-x-5 !tw-items-center">
      <span class="!tw-underline">Home</span>
    </a>
    <a href="#" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-gap-x-5 !tw-items-center">
      <i class="!tw-no-underline fas fa-chevron-right !tw-text-[#434343] lg:!tw-text-[calc(18/var(--base-screen)*100vw)] xl:!!tw-text-[18px]"></i>
      <span class="!tw-underline">Agoda Moments</span>
    </a>
    
    <a href="#" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-gap-x-5 !tw-items-center">
      <i class="!tw-no-underline fas fa-chevron-right !tw-text-[#434343] lg:!tw-text-[calc(18/var(--base-screen)*100vw)] xl:!!tw-text-[18px]"></i>
      <span class="!tw-underline">@Zoesennett</span>
    </a>
   
    <a href="#" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-gap-x-5 !tw-items-center">
      <i class="!tw-no-underline fas fa-chevron-right !tw-text-[#434343] lg:!tw-text-[calc(18/var(--base-screen)*100vw)] xl:!!tw-text-[18px]"></i>
      <span class="!tw-underline">Trip to Italy - 6 Days Adventure</span>
    </a>
  </div>

  <!-- Content Section -->
  <div class="max-screen lg:!tw-mt-[calc(36/var(--base-screen)*100vw)] xl:!tw-mt-[36px] !tw-grid lg:!tw-gap-x-[calc(34/var(--base-screen)*100vw)] xl:!tw-gap-x-[34px] lg:!tw-grid-cols-[1fr_calc(515/var(--base-screen)*100vw)] xl:!tw-grid-cols-[1fr_512px] w-full">
    <div class="!tw-flex !tw-flex-col">
      <div class="!tw-flex !tw-py-[calc(19/var(--base-screen)*100vw)] lg:!tw-py-[calc(20/var(--base-screen)*100vw)] xl:!tw-py-[20px] !tw-border-b-[#DDDDDD] !tw-border-b-[1px]">
        @include('components.influencer')
      </div>
      <!-- Content Title -->
      <h1 class="!tw-my-[calc(30/var(--base-screen)*100vw)] lg:!tw-my-[calc(42/var(--base-screen)*100vw)] xl:!tw-my-[42px] !tw-text-[#2A2A2E] !tw-font-[400] !tw-font-agoda-sans-stemless !tw-text-[calc(28/var(--base-screen)*100vw)] lg:!tw-text-[calc(48/var(--base-screen)*100vw)] xl:!tw-text-[48px]">{!! $title !!}</h1>

      <article class="Bootstrap">
        {!! the_content() !!}
      </article>

      <div class="!tw-mt-[calc(26/var(--base-screen)*100vw)] lg:!tw-mt-[calc(28/var(--base-screen)*100vw)] xl:!tw-mt-[28px] !tw-border-t !tw-border-t-[#00000040] !tw-pt-[calc(23/var(--base-screen)*100vw)] lg:!tw-pt-[calc(45/var(--base-screen)*100vw)] xl:!tw-pt-[45px]">
        {!! $social_share !!}
      </div>
    </div>

    <!-- You may also like -->
    <div class="!tw-hidden lg:!tw-block">
      <h2 class="!tw-text-[#2A2A2E] !tw-font-[400] !tw-font-agoda-sans-stemless !tw-text-[calc(28/var(--base-screen)*100vw)] lg:!tw-text-[calc(48/var(--base-screen)*100vw)] xl:!tw-text-[48px]">You may also like</h2>
      <div class="lg:!tw-mt-[calc(38/var(--base-screen)*100vw)] xl:!tw-mt-[38px] !tw-flex !tw-flex-col lg:!tw-gap-y-[1.5vw] xl:!tw-gap-y-[30px]">
        <!-- Card 1 -->
        @include('components.you-may-also-like-card-horizontal')

        <!-- Card 2 -->
        @include('components.you-may-also-like-card-horizontal')

        <!-- Card 3 -->
        @include('components.you-may-also-like-card-horizontal')

        <!-- Card 4 -->
        @include('components.you-may-also-like-card-horizontal')

        <!-- Card 5 -->
        @include('components.you-may-also-like-card-horizontal')

        <!-- Card 6 -->
        @include('components.you-may-also-like-card-horizontal')
      </div>
    </div>
  </div>

  <!-- Mobile -->
  <div class="lg:!tw-hidden lg:!tw-mt-[calc(38/var(--base-screen)*100vw)] xl:!tw-mt-[38px] !tw-flex !tw-flex-col lg:!tw-gap-y-[1.5vw] xl:!tw-gap-y-[30px]">
      @include('partials.you-may-also-like')
  </div>

  <div class="!tw-w-full">
    @include('partials.page-banner')
  </div>
</div>