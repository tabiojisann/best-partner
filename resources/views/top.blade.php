@guest
  <div class="container mb-3">
    <div class="row">
      <div class="col-8 offset-2 bg-light">
        <div class="col-10 col-md-6 d-flex justify-content-end">
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

      <nav class="nav nav-pills nav-fill mt-5">
        <a class="nav-item nav-link text-white bg young-passion-gradient" href="{{ route('users.edit', ['user' => $user]) }}">マイページ</a>
        <a class="nav-item nav-link text-white bg young-passion-gradient" href="{{ route('users.articles', ['user' => $user]) }}">投稿済み</a>
        <a class="nav-item nav-link text-white bg young-passion-gradient" href="{{ route('articles.create') }}">募集をかける</a>
      </nav>
    </div>
  </div>
@endauth

