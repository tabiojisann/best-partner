<!-- <div class="search-head">
  <form action="{{ route('articles.search') }}" method="GET">
    <div class="input-group col-8 form-group form-sm form-2 pl-0 mt-3">
    <input class="form-control my-0" type="text" name="keyword" placeholder="キーワードを入力" aria-label="Search" value="{{ $keyword ?? old('keyword') }}">
      <div class="input-group-append">
        <span class="input-group-text gray lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
            aria-hidden="true"></i></span>
      </div>
    </div>
  </form>
</div> -->



<div class="dropdown head">
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



<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">
  <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="100" border="0" class="horizontal">
  </a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
      class="navbar-toggler-icon"></span></button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

    </ul>
    <!-- Links -->

    <!-- Search form -->
    <form class="form-inline">
      <input class="form-control" type="text" placeholder="Search" aria-label="Search">
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->