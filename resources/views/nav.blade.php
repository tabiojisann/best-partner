  @guest
    <nav class="navbar navbar-dark light-color">
      <a class="navbar-brand" href="/">  
        <img src="{{ asset('logo/lookforp.png') }}" width="150" border="0" class="horizontal">
      </a>
      <div>
        <a href="{{ route('login') }}" class="btn btn-outline-danger waves-effect p-1 ">
          <span class="text-primary">ログイン</span></a>
        <a href="{{ route('register') }}" class="btn blue text-white p-2 ">会員登録</a>
      </div>  
    </nav>
  @endguest

  @auth

  <!-- モバイル -->

    <nav class="navbar navbar-expand-lg navbar-light mb-4 sticky-top Desk">

      <a class="navbar-brand" href="/">  
        <img src="{{ asset('logo/lookforp.png') }}" width="120" border="0" class="horizontal">
      </a>  

      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Links -->
        <ul class="navbar-nav ml-auto">


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">記事
            </a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <button class="dropdown-item" type="button"
                      onclick="location.href='{{ route('articles.create') }}'">
                募集をかける
            </button>
            </div>
          </li>

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">ユーザー
            </a>
            <div class="dropdown-menu dropdown-primary mr-auto" aria-labelledby="navbarDropdownMenuLink">

              <button class="dropdown-item" type="button"
                      onclick="location.href='{{ route('users.show', $user ?? '') }}'">
              マイページ
              </button>
              <div class="dropdown-divider"></div>
              <button class="dropdown-item" type="button"
                      onclick="location.href='{{ route('users.articles', $user ?? '') }}'">
                募集した記事
              </button>
              <div class="dropdown-divider"></div>
              <button form="logout-button-mobile" class="dropdown-item text-danger" type="submit">
                ログアウト
              </button>

            </div>
            <form id="logout-button-mobile" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </li>


          <form action="{{ route('articles.search') }}" method="GET">
            <input class="form-control mt-3 py-1" type="text" name="keyword" placeholder="キーワードで検索" aria-label="Search" value="{{ $keyword ?? old('keyword') }}">
            <div class="">
              <label for="style" class="text-muted">募集スタイル</label>
              <select name="style" id="styleMobile" class="browser-default custom-select" value="" id="">
                <option value="" class="d-none">選択してください</option>
                <option value="1">漫才</option>
                <option value="2">コント</option>
                <option value="3">その他</option>
              </select>
            </div>

            <div class="">
              <label for="position" class="text-muted">募集ポジション</label>
              <select name="position" id="positionMobile" class="browser-default custom-select p-2" value="" id="">
                <option value="" class="d-none">選択してください</option>
                <option value="1" >ボケ</option>
                <option value="2">ツッコミ</option>
                <option value="3">その他</option>
              </select>
            </div>

            <div class="d-flex justify-content-center p-2">
              <button type="submit" class="btn winter-neva-gradient pink-text">検索</button>
            </div>
          </form>

        </ul>
        <!-- Links -->
     
      </div>
      <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->


    <!-- デスクトップ -->

    <nav class="navbar navbar-dark light-color Mobile">
      <a class="navbar-brand" href="/">  
      <img src="{{ asset('logo/lookforp.png') }}" width="150" border="0" class="horizontal">
      </a>  
      <ul class="navbar-nav ml-auto">
        <button type="submit" form="logout-button-desk" class="btn btn-outline-danger waves-effect">ログアウト</button>
      </ul>
      <form action="{{ route('logout') }}" method="POST" id="logout-button-desk">
        @csrf
      </form>
    </nav>

  @endauth

