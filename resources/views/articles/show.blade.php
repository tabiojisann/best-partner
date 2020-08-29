@extends('app')

@section('title', '記事詳細')

@section('content')
  @include('nav')

  @include('articles.showCard')

  @include('footer')
@endsection




