
  <nav class="cloudy-knoxville-gradient overlay">

    <div class="row">
      <div class="col-12">

      <div class="col-2 col-md-6">
        <a class="navbar-brand" href="/" class="">
          <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="100" border="0" class="horizontal">
          <!-- <img src="{{ asset('logo/Best Partner-logo.png')}}" width="100" alt=""> -->
        </a>
      </div>

      @guest
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
      @endguest

      @auth
        <!-- <form action="{{ route('articles.search') }}" method="GET">
          <div class="input-group col-12 form-group form-sm form-2 pl-0 mt-3">
          <input class="form-control my-0" type="text" name="keyword" placeholder="キーワードを入力" aria-label="Search" value="{{ $keyword ?? old('keyword') }}">
            <div class="input-group-append">
              <span class="input-group-text gray lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
            </div>
          </div>
        </form> -->
      @endauth
      </div>
    </div>  
  </nav>



