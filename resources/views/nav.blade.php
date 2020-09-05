  @guest
    <nav class="navbar navbar-dark light-color">
      <a class="navbar-brand" href="/">  
        <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="100" border="0" class="horizontal">
      </a>  
    </nav>
  @endguest


  @auth
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

      <!-- Navbar brand -->
      <a class="navbar-brand" href="/">  
        <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="100" border="0" class="horizontal">
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
              <button form="logout-button" class="dropdown-item" type="submit">
                ログアウト
              </button>

            </div>
            <form id="logout-button" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </li>


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

    
  @endauth




