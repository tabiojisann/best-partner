@guest
  <div class="container mb-3">
    <div class="row">
      <div class="col-8 offset-2 bg-light">
        <div class="col-10 col-md-6 d-flex justify-content-end">
          <a href="{{ route('register') }}" class="nav-link mt-2">
            <button type="button" class="btn-sm btn-outline-info waves-effect">
              <span class="text-success">会員登録</span>
            </button>
          </a>
          <a href="{{ route('login') }}" class="nav-link mt-2">
            <button type="button" class="btn-sm btn-outline-info waves-effect">
              <span class="text-success">ログイン</span>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="text-center peach-gradient animated fadeIn slower" style="height: 200px;">
    <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="200"  border="0" class="horizontal animated fadeInRight slow">
    <a href="{{ route('register') }}">
      <h2 class="text-success mt-4 animated fadeIn delay-4s">始める</h2>
    </a>
  </div> -->
@endguest

@include('flash')

@auth
  <div class=" morpheus-den-gradient py-5">
    <div class="container border my-4">
      <a href="{{ route('users.show', ['user' => $user]) }}" class="text-muted d-flex justify-content-center">
        <img src="{{ $user->image ?: asset('logo/user.jpg') }}" class="d-inline rounded-circle" height="50" width="45" alt="">
        <h3 class="d-inline ml-3 mt-2">ようこそ<span class="blue-text">{{ $user->name }}</span>さん！</h3>
      </a>

      <nav class="nav nav-pills nav-fill mt-5">
        <a class="nav-item nav-link text-white bg young-passion-gradient" href="{{ route('users.show', ['user' => $user]) }}">マイページ</a>
        <a class="nav-item nav-link text-white bg young-passion-gradient" href="{{ route('users.articles', ['user' => $user]) }}">投稿済み</a>
        <a class="nav-item nav-link text-white bg young-passion-gradient" href="{{ route('articles.create') }}">募集をかける</a>
      </nav>
    </div>
  </div>
@endauth

