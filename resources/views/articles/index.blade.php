@extends('app')

@section('title', 'Best Partner')

@section('content')
  @include('nav')

  @include('top')
  <!-- body -->
 
  @auth
    @include('articles.tabs', ['hasArticles' => true, 'hasUsers' => false, 'hasKeeps' => false])
  @endauth
  
  <div class="row heavy-rain-gradient">

    <div class="card border-light col-3 offset-1 my-5 search">
      @include('articles.searchForm')
    </div>

    <!-- 記事一覧 -->

    <div class="col-6 offset-1 pb-5">
      @foreach($articles as $article)
        @include('articles.card')
      @endforeach
    </div>
  </div>  

  @include('footer')


@endsection







