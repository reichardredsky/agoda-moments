@extends('layouts.app')
@section('content')
  @include('partials.influencer-page-header')
  @include('partials.content-influencer-featured-moments', [
    'header_title' => __('Top Travel Tips', 'moments'),
  ])
  @include('partials.popular-posts', [
    'filter_label' => 'All Cities'
  ])

@endsection

