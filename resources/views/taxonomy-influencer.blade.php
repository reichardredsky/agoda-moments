@extends('layouts.app')
@section('content')
  @include('partials.influencer-page-header')
  @include('partials.content-featured-moments', [
    'header_title' => __('Top Travel Tips', 'moments')
  ])
  @include('partials.popular-posts', [
    'has_category' => true
  ])

@endsection

