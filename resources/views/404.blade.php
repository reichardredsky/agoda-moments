@extends('layouts.app')

@section('content')
  <!-- component -->
<div class="tw-min-h-[60vh] lg:tw-px-24 lg:tw-py-24 md:tw-py-20 md:tw-px-44 tw-px-4 tw-py-24 tw-items-center tw-flex tw-justify-center tw-flex-col-reverse lg:tw-flex-row md:tw-gap-28 tw-gap-16">
    <div class="xl:tw-pt-24 tw-w-full xl:tw-w-1/2 tw-relative tw-pb-12 lg:tw-pb-0">
        <div class="tw-relative">
            <div class="tw-absolute">
                <div class="">
                    <h1 class="tw-my-2 tw-text-gray-800 tw-font-bold tw-text-2xl">
                        Sorry!
                    </h1>
                    <p class="tw-my-2 tw-text-tw-gray-800">We looked everywhere, but couldn't find the page you requested. Shall we start a new exploration?</p>
                    <a href="/" class="sm:tw-w-full lg:tw-w-auto tw-my-2 tw-border tw-rounded tw-md tw-py-4 tw-px-8 tw-text-center tw-bg-blue-600 tw-text-white hover:tw-bg-blue-700 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-700 focus:tw-ring-opacity-50">Take me there!</a>
                </div>
            </div>
            <div>
                <img src="https://i.ibb.co/G9DC8S0/404-2.png" />
            </div>
        </div>
    </div>
    <div>
        <img src="https://i.ibb.co/ck1SGFJ/Group.png" />
    </div>
</div>
@endsection
