@extends('app')

@section('title', 'Lookforp')

@section('content')
  @include('nav')

  @include('top')

  <!-- body -->
 
  @auth
    @include('articles.tabs', ['hasArticles' => true, 'hasUsers' => false, 'hasKeeps' => false])
  @endauth

  <div class="row light-blue lighten-5">

  <div class="overlay">
      <div class="btn_area">
          <p>下記のOKボタンを押してからブラウザを「更新」してみてください。表示されなくなるはずです。</p>
          <button>OK</button>
      </div>
    </div>

    @guest
    <!-- 記事一覧 -->
      <div class="col-10 offset-1 col-md-8 offset-md-2 p-3">
        @foreach($articles as $article)
          @include('articles.card')
        @endforeach
      </div>
    @endguest
      
    @auth

      <div class="card border-light col-md-4 col-lg-3 offset-md-1 my-5  Mobile search">
        @include('articles.searchForm')
      </div>
    <!-- 記事一覧 -->
      <div class="col-12 col-md-6 offset-md-1 pb-5">
        @foreach($articles as $article)
          @include('articles.card')
        @endforeach
      </div>
    @endauth

  </div>  

  @include('footer')


@endsection







