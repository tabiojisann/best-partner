@extends('app')

@section('title', 'ユーザー情報編集')

@section('content')
  @include('nav')



  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-6 offset-3">

        <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf

        
            <!-- <strong>アイコン</strong>
            <input type="file" name="image" class="form-control"> -->
            <template>
              <div class="input-group mt-5 pb-5">
             
                <div class="input-group-prepend">
                  <span class="input-group-text" id="image">アイコン</span>
                </div>
                
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image-area">
                  <label class="custom-file-label" for="image">任意で選択してください</label>
                </div>
              </div>
            </template>


          <div class="md-form">
            <strong>ニックネーム</strong>
            <strong class="text-danger">必須</strong>
            <input type="name" id="name" name="name"  class="form-control col-6" value="{{ $user->name ?? old('name')}}" required>
          </div>

          <br>
          
          <strong>性別</strong>
          <div class="form-control col-4">
            <div class="custom-control custom-radio custom-control-inline">
              
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

          <br>
          <br>
          
          <div class="md-form">
            <strong>生年月日</strong>
            <input type="date" class="form-control" name="birthday" value="2000-01-01" required>
          </div>

          <br>

          <div class="md-form"> 
            <strong>出身地</strong>
            <input type="text" name="birthplace" class="form-control col-4" value="{{ $user->birthplace }}">
          </div>
       
          <br>

          <div class="md-form">
            <strong>身長</strong>
            <input type="number" name="height" id="height" class="col-2" value="{{ $user->height }}">cm
          </div>

          <br>

          <div class="md-form">
            <strong>体重</strong>
            <input type="number" name="weight" id="weight" class="col-2" value="{{ $user->weight }}">kg
          </div>

          <br>

          <div class="md-form">
            <strong>趣味</strong>
            <input type="text" name="hobby" class="form-control" value="{{ $user->hobby }}">
          </div>

          <br>

          <div class="md-form">
            <strong>特技、資格</strong>
            <input type="text" name="skill" class="form-control" value="{{ $user->skill }}">
          </div>

          <br>

          <div class="md-form">
            <strong>学歴</strong>
            <input type="text" name="background" class="form-control" value="{{ $user->background }}">
          </div>

          <br>

          <div class="md-form">
            <strong>影響を受けたもの</strong>
            <input type="text" name="influence" class="form-control" value="{{ $user->influence }}">
          </div>

          <br>

          <div class="md-form">
            <strong>Youtubeチャンネル</strong>
            <input type="url" name="youtube" class="form-control" value="{{ $user->youtube }}">
          </div>

          <br>

          <div class="md-form">
            <strong>Twitterアカウント</strong>
            <input type="url" name="twitter" class="form-control" value="{{ $user->twitter }}">
          </div>

          <br>

          <div class="md-form">
            <strong>ブログURL</strong>
            <input type="url" name="blog" class="form-control" value="{{ $user->blog }}">
          </div>

          <br>

          <div class="md-form">
            <strong>備考欄</strong>
            <textarea name="PR" id="PR" cols="70" rows="30">{{ $user->PR }}</textarea>
          </div>

          <br>

          <input type="submit" class="btn btn-indigo" value="更新">

        </form>

      </div>
    </div>
  </div>



  @include('footer')
@endsection


