@extends('layouts.app')

@section('content')
  @include('partials.influencer-page-header')
  @include('partials.content-featured-moments')
  @include('partials.popular-posts')
  @include('partials.popular-influencers')
  @include('partials.page-banner')
@endsection

