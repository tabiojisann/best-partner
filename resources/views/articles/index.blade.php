@extends('app')

@section('title', 'Best Partner')

@section('content')
  @include('nav')

  @guest
    <div class="text-center peach-gradient" style="height: 500px;">
      <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="500" border="0" class="horizontal animated fadeInRight slower">
      <h1 class="text-white mt-5 animated fadeInLeft slower">俺とコンビ組まない?</h1>
      <a href="{{ route('register') }}">
        <h2 class="text-success mt-4 animated fadeIn delay-4s">はい</h2>
      </a>
    </div>
  @endguest

  <!-- body -->
  @auth
    @include('articles.tabs', ['hasArticles' => true, 'hasUsers' => false])
  @endauth
  
  <div class="row  lime lighten-5">

    <div class="card border-light col-3 offset-1 my-5" style="max-height: 440px;">
      <p class="card-header">検索</p>
        <div class="card-body">
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
            <label class="custom-control-label" for="defaultGroupExample1">Option 1</label>
          </div>

          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
            <label class="custom-control-label" for="defaultGroupExample2">Option 2</label>
          </div>
  
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
            <label class="custom-control-label" for="defaultGroupExample3">Option 3</label>
          </div>

          <form class="form-inline mr-auto mt-5">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
          </form>
        </div>
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





