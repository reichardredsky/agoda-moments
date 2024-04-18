<div class="max-screen tw-mx-auto tw-mt-[calc((32/var(--base-screen)*100vw)-1.25rem)] lg:tw-mt-[calc((61/var(--base-screen)*100vw)-1.25rem)] xl:tw-mt-[calc(61px-1.25rem)] tw-flex-col tw-flex tw-items-center tw-relative">
  <div class="tw-flex tw-justify-between rtl--headings tw-w-full">
    <h2 class="tw-font-agoda-sans-stemless tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] tw-mb-[calc(30/var(--base-screen)*100vw)] lg:tw-mb-[calc((61/var(--base-screen))*100vw)] xl:tw-mb-[61px] tw-text-[#2A2A2E]">
      {{ __('Popular Agoda Travel Experts', 'popular-agoda-travel-experts') }}
    </h2>
  </div>

  <div class="tw-grid tw-grid-cols-2 sm:tw-grid-cols-3 md:tw-grid-cols-4 lg:tw-grid-cols-6 tw-gap-[calc(19/var(--base-screen)*100vw)] lg:tw-gap-[calc(28.15/var(--base-screen)*100vw)] xl:tw-gap-[28.15px]" id="influencers">
    @foreach( $influencers as $influencer )
      @include('components.influencer-profile', ['name' => $influencer->name, 'description' => $influencer->description, 'profile_url' => $influencer->profile_picture, 'link' => $influencer->link])
    @endforeach
  </div>
  <button class="tw-bg-[#3E5CCC] tw-rounded-[999px] tw-px-3 tw-py-1 lg:tw-px-5 xl:tw-py-2 tw-text-white hover:tw-opacity-90 tw-mt-5 tw-text-[calc(16/var(--base-screen)*100vw)] lg:tw-text-[16px]" id="loadMoreInfluencers">{{ __('Load more', 'moments') }}</button>
</div>

<script>
    var page = 1;
    const perPage = {{ $perPage }};
    jQuery('#loadMoreInfluencers').click(function(){
      console.log('ajax call');
        jQuery.ajax({
            url: '{{ admin_url('admin-ajax.php') }}',
            type: 'post',
            data: {
                action: 'load_more_influencers',
                page: page,
                per_page: perPage
            },
            success: function(response){
                jQuery('#influencers').append(response)
            }
        })
    })
</script>