<div class="!tw-flex !tw-flex-col">
    <a href="{{ $result->link }}" class="!tw-text-black">
        <div class="!tw-grid !tw-py-5 tw-border-b" style="grid-template-columns: auto 1fr">
            <div class="!tw-h-0 !tw-w-[160px]"
                style="padding-top: calc(100% / (2 / 2)); background-image: url('{{ $result->thumbnail }}')">
            </div>
            <div class="!tw-flex !tw-ml-5 !tw-flex-col !tw-justify-center">
                <p class="!tw-font-bold !tw-text-lg">{!! $result->title !!}</p>
                <span class="!tw-mt-5">{!! $result->excerpt !!}</span>
            </div>
        </div>
    </a>
</div>
