@extends('app')

@section('title', 'ユーザー情報編集')

@section('content')
  @include('nav')
    <div class="container cloudy-knoxville-gradient" style="max-width: 100%;">
      @include('errors')
        <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf

          <div class="row">

            <div class="col-4 offset-1 mt-5 pb-5">
              <div class="input-group mt-5 pb-5">
                
                <div class="input-group-prepend">
                  <span class="input-group-text" id="image"><i class="fas fa-image"></i></span>
                </div>
                <div class="custom-file w-50">
                  <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image-area">
                  <label class="custom-file-label" for="image">イメージ画像</label>
                </div>
              </div>
            </div>

            <div class="col-4 offset-1 mt-5">

              <div class="d-flex justify-content-between">
                <div class="md-form mt-5 w-100">
                  <labal class="text-muted">ニックネーム</label>
                  <strong class="text-danger">必須</strong>
                  <input type="name" id="name" name="name"  class="form-control col-6" value="{{ $user->name ?? old('name')}}" required>
                </div>

                <a href="{{ route('users.show', ['user' => $user]) }}" class="h3 text-muted mt-5 mr-1">
                  <i class="fas fa-arrow-circle-left"></i>
                </a>
              </div>

       

                
              <div class="md-form mt-5">
                <strong class="text-muted">生年月日</strong class="text-muted">
                <input type="date" class="form-control" name="birthday" value="2000-01-01" required>
              </div>

              <label class="text-muted">性別</label class="text-muted">
              <div class="form-control d-flex justify-content-center">
                <div class="custom-control custom-radio custom-control-inline ">
          
                  
                  <input type="radio" class="custom-control-input" id="男性" name="sex" value="男性"  
                    <?php 
                      if( !empty($user->sex)){
                        if($user->sex === "男性") {
                          echo 'checked';
                        }
                      }
                    ?>
                  >
                  <label class="custom-control-label" for="男性">男性</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="女性" name="sex" value="女性"  
                    <?php 
                      if( !empty($user->sex)){
                        if($user->sex === "女性") {
                          echo 'checked';
                        }
                      }
                    ?>
                  >
                  <label class="custom-control-label" for="女性">女性</label>
                </div>

              </div>

              <div class="md-form mt-5"> 
                <label class="text-muted">出身地</label class="text-muted">
                <input type="text" name="birthplace" class="form-control" value="{{ $user->birthplace }}">
              </div>

              <div class="md-form mt-5">
                <strong class="text-muted">身長</strong class="text-muted">
                <input type="number" name="height" id="height" class="col-2" value="{{ $user->height }}">cm
              </div>

      

              <div class="md-form mt-5">
                <strong class="text-muted">体重</strong class="text-muted">
                <input type="number" name="weight" id="weight" class="col-2" value="{{ $user->weight }}">kg
              </div>

              

              <div class="md-form mt-5">
                <label class="text-muted">趣味</label class="text-muted">
                <input type="text" name="hobby" class="form-control" value="{{ $user->hobby }}">
              </div>

              

              <div class="md-form mt-5">
                <label class="text-muted">特技、資格</label class="text-muted">
                <input type="text" name="skill" class="form-control" value="{{ $user->skill }}">
              </div>

              

              <div class="md-form mt-5">
                <label class="text-muted">学歴</label class="text-muted">
                <input type="text" name="background" class="form-control" value="{{ $user->background }}">
              </div>

              

              <div class="md-form mt-5">
                <label class="text-muted">影響を受けたもの</label class="text-muted">
                <input type="text" name="influence" class="form-control" value="{{ $user->influence }}">
              </div>

              

              <div class="md-form mt-5">
                <label class="text-muted">Youtubeチャンネル</label class="text-muted">
                <input type="url" name="youtube" class="form-control" value="{{ $user->youtube }}">
              </div>

              

              <div class="md-form mt-5">
                <label class="text-muted">Twitterアカウント</label class="text-muted">
                <input type="url" name="twitter" class="form-control" value="{{ $user->twitter }}">
              </div>

              

              <div class="md-form mt-5">
                <label class="text-muted">ブログURL</label class="text-muted">
                <input type="url" name="blog" class="form-control" value="{{ $user->blog }}">
              </div>

             
                        
            </div>

            <div class="container mb-5 " style="max-width: 100%;">
              <div class="row border-top">
                <div class="">
                  <div class="col-6 mt-5">
                    <div class="md-form">
                      <textarea name="PR" id="PR" cols="70" rows="30">{{ $user->PR }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <input type="submit" class="btn btn-indigo" value="更新">

          </div>
        </div>

        </form>
    </div>

  @include('footer')
@endsection

