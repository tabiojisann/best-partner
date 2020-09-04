@guest
  <div class="text-center peach-gradient animated fadeIn slower" style="height: 500px;">
    <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="500" border="0" class="horizontal animated fadeInRight slow">
    <h1 class="text-white mt-5 animated fadeInLeft slower">俺とコンビ組まない?</h1>
    <a href="{{ route('register') }}">
      <h2 class="text-success mt-4 animated fadeIn delay-4s">はい</h2>
    </a>
  </div>
@endguest

@if (session('flash_message'))
  <div class="flash_message">
      {{ session('flash_message') }}
  </div>
@endif

@auth
  <div class="container border border-success my-4">
    <a href="{{ route('users.show', ['user' => $user]) }}" class="text-muted d-flex justify-content-center">
      <img src="{{ $user->image ?: asset('logo/user.jpg') }}" class="d-inline rounded-circle" height="50" width="45" alt="">
      <h3 class="d-inline ml-3 mt-2">ようこそ<span class="text-danger">{{ $user->name }}</span>さん！</h3>
    </a>

    <div class="dropdown">
      <!--Trigger-->
      <a class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">ユーザー</a>

      <!--Menu-->
      <div class="dropdown-menu dropdown-primary">
        <a class="dropdown-item" href="{{ route('users.show', ['user' => $user]) }}">マイページ</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('users.articles', ['user' => $user]) }}">募集した記事</a>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
      <form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
      </form>
    </div>

    <div class="dropdown">
      <!--Trigger-->
      <a class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">記事</a>
      <div class="dropdown-menu dropdown-success ">
        <a class="dropdown-item" href="{{ route('articles.create') }}">募集をかける</a>
      </div>
    </div>

  </div>

 
@endauth