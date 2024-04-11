<div class="max-screen !tw-flex !tw-flex-wrap !tw-gap-y-[calc(15/var(--base-screen)*100vw)] lg:!tw-gap-y[20px] !tw-mt-[calc(15/var(--base-screen)*100vw)] lg:!tw-mt-[calc(30/var(--base-screen)*100vw)] xl:!tw-mt-[30px] !tw-flex !tw-items-center !tw-gap-x-5 !tw-text-[calc(12/var(--base-screen)*100vw)] lg:!tw-text-[calc(17/var(--base-screen)*100vw)] xl:!tw-text-[17px] !tw-text-[#434343]">

  @foreach($siteBreadcrumbs as $index => $breadcrumb)
    @php($breadcrumb = (object) $breadcrumb)
    @if ($index === 0)
    <a href="#" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-gap-x-5 !tw-items-center">
      <span class="!tw-underline">{{ $breadcrumb->name }}</span>
    </a>
    @else
    <a href="#" class="!tw-text-nowrap !tw-text-[#434343] !tw-flex !tw-gap-x-5 !tw-items-center">
      <i class="!tw-no-underline fas fa-chevron-right !tw-text-[#434343] lg:!tw-text-[calc(18/var(--base-screen)*100vw)] xl:!!tw-text-[18px]"></i>
      <span class="!tw-underline">{{ $breadcrumb->name }}</span>
    </a>
    @endif
  @endforeach
</div>