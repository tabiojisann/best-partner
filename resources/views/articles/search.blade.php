@extends('app')

@section('title', '検索結果')

@section('content')
  @include('nav')

  <!-- body -->
  @auth
    @include('articles.tabs', ['hasArticles' => true, 'hasUsers' => false])
  @endauth
  
  <div class="row lime lighten-5">

    <div class="card border-light col-3 offset-1 my-5" style="max-height: 440px;">
      @include('articles.searchForm') 
    </div>

    <!-- 記事一覧 -->

    @if($articles->count())
    
      <div class="col-6 offset-1 pb-5">
        @foreach($articles as $article)
          @include('articles.card')
        @endforeach
      </div>

    @endif
  </div>  

  @include('footer')

@endsection