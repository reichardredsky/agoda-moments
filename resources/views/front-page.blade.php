@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @include('partials.content-featured-moments')
  @include('partials.popular-influencers')
  @include('partials.popular-posts')
  @include('partials.page-banner')
  @include('partials.you-may-also-like')
@endsection

