
@extends('app')

@section('title', 'ログイン')

@section('content')
    <!-- <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="100" border="0" class="horizontal"> -->
  <div class="container pb-5" style="max-width: 100%;">
    <div class="row">
      <a class="col-12 text-center my-5" href="/">  
        <img src="{{ asset('logo/lookforp.png') }}" height="80" width="300" border="0" class="horizontal">
      </a>  
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <section class="form-simple">
          <div class="card">

            <div class="header pt-3 grey lighten-2">
              <div class="row d-flex justify-content-center">
                <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">ログイン</h3>
              </div>
            </div>

            @include('errors')

            <div class="card-body mx-4 mt-4">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <input type="text" id="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
            

                <div class="form-group pb-3">
                  <label for="password">パスワード</label>
                  <input type="password" id="password" name="password" class="form-control" required>
                  <a href="#" class="dark-grey-text font-weight-bold"> 
                    <p class="text-center mt-2">パスワードをお忘れですか？？</p>

                  </a>
                </div>

                <input type="hidden" name="remember" id="remember" value="on">

                <div class="text-center mb-4">
                  <button type="submit" class="btn btn-danger btn-block z-depth-2">ログイン</button>
                </div>
              </form>

              <p class="font-small grey-text d-flex justify-content-center">
                <a href="{{ route('register') }}" class="dark-grey-text font-weight-bold ml-1"> 
                  アカウントをお持ちでない方はこちら
                </a>
              </p>
            </div>

          </div>
        </section>

      </div>
    </div>
  </div>
@endsection