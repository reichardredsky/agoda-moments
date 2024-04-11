<div class="tw-flex tw-flex-col lg:tw-flex-row lg:tw-items-center tw-gap-x-[10px] tw-pt-5">
  <a href="{{ $influencer_link }}">
    <div class="tw-flex tw-items-center hover:tw-opacity-80 tw-delay-75 tw-transition-opacity">
      <img src="{{ $avatar }}" alt="Like" class="tw-object-cover tw-w-[calc(60/var(--base-screen)*100vw)] tw-h-[calc(60/var(--base-screen)*100vw)] lg:tw-w-[calc(60/var(--base-screen)*100vw)] lg:tw-h-[calc(60/var(--base-screen)*100vw)] xl:tw-w-[60px] xl:tw-h-[60px] tw-mr-[10px] tw-rounded-full" />
      <span class="tw-font-agoda-sans-stemless tw-text-[#24262C] tw-text-[calc(22/var(--base-screen)*100vw)] xl:tw-text-[22px] tw-font-[900]">
        {!! $name !!} 
      </span>
    </div>
  </a>
  
  @if($is_show_date ?? true)
    <span class="tw-hidden lg:tw-block tw-text-gray-300">|</span>
    <span class="tw-ml-auto lg:tw-ml-0 tw-text-[calc(12/var(--base-screen)*100vw)] lg:tw-text-[12px] tw-text-[#2A2A2E]">
      {{ $date }}
    </span>
  @endif
</div>