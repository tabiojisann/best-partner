@extends('app')
@section('title', '検索結果')

@section('content')
  @include('nav')

  <!-- body -->
  @auth
    @include('articles.tabs', ['hasArticles' => true, 'hasUsers' => false, 'hasKeeps' => false])
  @endauth
  
  <div class="row heavy-rain-gradient">

    <div class="card border-light col-md-4 col-lg-3 offset-md-1 my-5 Mobile search">
      @include('articles.searchForm') 
    </div>

    <!-- 検索結果 -->
 
    <div class="col px-5">
      @if(!empty($keyword || $style || $position))
        @if($articles->count())
          @foreach($articles as $article)
            @include('articles.card')
          @endforeach
        @else
          <p class="text-center animated fadeInRight">条件に合致する募集要綱が見つかりませんでした</p>
        @endif
      @else
        <p class="text-center animated fadeInRight">条件を最低1項目入力してください</p>
      @endif
    </div>
  </div>  

  @include('footer')

@endsection