<div class="max-screen tw-mx-auto tw-mt-[calc((32/var(--base-screen)*100vw)-1.25rem)] lg:tw-mt-[calc((61/var(--base-screen)*100vw)-1.25rem)] xl:tw-mt-[calc(61px-1.25rem)] tw-flex-col tw-flex">
  <div class="tw-flex tw-justify-between rtl--headings">
    <h2 class="tw-font-agoda-sans-stemless tw-font-[400] tw-text-[calc((28/var(--base-screen))*100vw)] lg:tw-text-[calc((48/var(--base-screen))*100vw)] xl:tw-text-[48px] tw-mb-[calc(30/var(--base-screen)*100vw)] lg:tw-mb-[calc((61/var(--base-screen))*100vw)] xl:tw-mb-[61px] tw-text-[#2A2A2E]">
      Popular Agoda Moments influencers
    </h2>
  </div>

  <div class="tw-grid tw-grid-cols-2 sm:tw-grid-cols-3 md:tw-grid-cols-4 lg:tw-grid-cols-6 tw-gap-[calc(19/var(--base-screen)*100vw)] lg:tw-gap-[calc(28.15/var(--base-screen)*100vw)] xl:tw-gap-[28.15px]" id="popularDestinations">
    @include('components.influencer-profile', ['profile_url' => asset('images/png/influencer_1.png')])
    @include('components.influencer-profile', ['profile_url' => asset('images/webp/pexels-photo-415829.webp')])
    @include('components.influencer-profile', ['profile_url' => asset('images/webp/profile_picture_maker_before.webp')])
    @include('components.influencer-profile', ['profile_url' => asset('images/webp/round_profil_picture_before_.webp')])
    @for($i=1; $i<=8; $i++)
      @include('components.influencer-profile', ['profile_url' => 'https://i.pravatar.cc/300/'.$i])
    @endfor
  </div>
</div>