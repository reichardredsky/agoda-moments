@extends('layouts.app')

@section('content')
  @include('partials.page-header', [
    'header_title' => __('Agoda Travel Tips', 'moments')
    ])
  @include('partials.content-featured-moments', [
    'header_title' => __('Top Travel Tips', 'moments')
    ])
  @include('partials.popular-influencers')
  @include('partials.popular-posts', [
    'title' => __('Recently Updated Travel Tips', 'moments')
    ])
  {{--
    @include('partials.page-banner')
  @include('partials.you-may-also-like')
    --}}
@endsection

