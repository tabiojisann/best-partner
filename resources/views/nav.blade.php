
  <nav class="navbar navbar-dark cloudy-knoxville-gradient overlay sticky-top">

  
    <div class="row">
      <a class="navbar-brand offset-2" href="/">
        <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="100" border="0" class="horizontal">
        <!-- <img src="{{ asset('logo/Best Partner-logo.png')}}" width="100" alt=""> -->
      </a>
    </div>

    @guest
      <div class="row ">
        <a href="{{ route('register') }}" class="nav-link ">
          <button type="button" class="btn btn-outline-info waves-effect">
            <span class="text-success">会員登録</span>
          </button>
        </a>
        <a href="{{ route('login') }}" class="nav-link ">
          <button type="button" class="btn btn-outline-info waves-effect">
            <span class="text-success">ログイン</span>
          </button>
        </a>
      </div>
    @endguest

    @auth
      <a href="{{ route('users.show', ['user' => $user]) }}" class="text-danger">
        <img src="{{ $user->image ?: asset('logo/NoImage.jpg') }}" class="d-inline rounded-circle" height="50" width="45" alt="">
        <h3 class="d-inline ml-3">{{ $user->name }}</h3>
      </a>
    @endauth

    @auth
      <div class="row">
        <a href="{{ route('articles.create') }}">
          <button type="button" class="btn btn-outline-default waves-effect">
            
          <span class="text-primary font-weight-bold">募集をかける</span>
          </button>
        </a>
        <button form="logout-button" class="btn btn-outline-default waves-effect" type="submit">
          <span class="text-primary font-weight-bold">ログアウト</span>
        </button>
        <form id="logout-button" method="POST" action="{{ route('logout') }}">
          @csrf
        </form>
      </div>
    @endauth
  </nav>


