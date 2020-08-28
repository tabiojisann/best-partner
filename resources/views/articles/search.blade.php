@extends('app')
@section('title', '検索結果')

@section('content')
  @include('nav')

  <!-- body -->
  @auth
    @include('articles.tabs', ['hasArticles' => true, 'hasUsers' => false])
  @endauth
  
  <div class="row heavy-rain-gradient">

    <div class="card border-light col-3 offset-1 my-5 search">
      @include('articles.searchForm') 
    </div>

    <!-- 検索結果 -->
 
      <div class="col-6 offset-1 pb-5">
        @if(!empty($keyword || $style || $position))
          @if($articles->count())
            @foreach($articles as $article)
              @include('articles.card')
            @endforeach
          @else
            <p class="mt-5">条件に合致する募集要綱が見つかりませんでした</p>
          @endif
        @else
          <p class="mt-5">条件を最低1項目入力してください</p>
        @endif
    </div>
  </div>  

  @include('footer')

@endsection