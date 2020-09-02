@extends('app')

@section('title', $user->name . 'の気になるリスト')


@section('content')
  @include('nav')

  @include('top')
  
  @include('articles.tabs', ['hasArticles' => false, 'hasUsers' => false, 'hasKeeps' => true])
  <div class="col-6 offset-1 pb-5">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>

  @include('footer')

@endsection