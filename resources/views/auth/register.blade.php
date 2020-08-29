
@extends('app')

@section('title', 'ユーザー登録')

@section('content')
  <a class="navbar-brand" href="/">
    <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="100" border="0" class="horizontal">
  </a>
  <div class="container pb-5" style="margin-top: 50px;">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <div class="card mx-xl-5 grey lighten-5">
        
          <div class="card-body">
      
            <p class="h4 text-center border-bottom py-4">新規登録</p>

            @include('errors')

            <form method="POST" class="" action="{{ route('register') }}">
              @csrf

              <register :response-data="{{ json_encode($errors) }}">
              </register>

       


              <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="password" name="password" class="form-control" required>
                <label for="password" class="font-weight-light">パスワード</label>
              </div>

              <div class="md-form">
                <i class="fa fa-exclamation-triangle  prefix grey-text"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                <label for="password_confirmation" class="font-weight-light">パスワード(確認)</label>
              </div>
              

              <div class="text-center py-4 mt-3">
                <button class="btn btn-info" onclick="checkName()" type="submit">登録</button>
              </div>
            </form>

            <div class="mt-0 text-center">
                <a href="{{ route('login') }}" class="text-success">ログインはこちら</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  @include('footer')
@endsection