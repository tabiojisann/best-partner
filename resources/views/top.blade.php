@guest
  <div class="text-center peach-gradient" style="height: 500px;">
    <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="500" border="0" class="horizontal animated fadeInRight slower">
    <h1 class="text-white mt-5 animated fadeInLeft slower">俺とコンビ組まない?</h1>
    <a href="{{ route('register') }}">
      <h2 class="text-success mt-4 animated fadeIn delay-4s">はい</h2>
    </a>
  </div>
@endguest

@auth
  <div class="container border border-success my-4">
    <a href="{{ route('users.show', ['user' => $user]) }}" class="text-muted d-flex justify-content-center">
      <img src="{{ $user->image ?: asset('logo/user.jpg') }}" class="d-inline rounded-circle" height="50" width="45" alt="">
      <h3 class="d-inline ml-3 mt-2">ようこそ<span class="text-danger">{{ $user->name }}</span>さん！</h3>
    </a>
  </div>
@endauth