@extends('app')

@section('title', 'プロフィール編集')

@section('content')
  @include('nav')
  <form method="POST" action="{{ route('users.profileUpdate', ['user' => $user]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row ">
      <div class="container blue lighten-5" style="max-width: 100%;">

          <div class="text-center pt-5">
            @include('errors')
          </div>

            <div class="col-12 col-sm-12 col-md-8 offset-md-2 blue lighten-4 mt-5">

              <div class="form-group col-10 col-md-7 col-lg-5">
                <labal class="text-muted">ニックネーム</label>
                <strong class="text-danger">必須</strong>
                <input type="name" id="name" name="name"  class="form-control" value="{{ $user->name ?? old('name')}}" required>
              </div>
                
              <div class="form-group col-10 col-md-7 col-lg-5  mt-5">
                <strong class="text-muted">生年月日</strong class="text-muted">
                <input type="date" class="form-control" name="birthday" value="datetime-local">
              </div>

              <div class="form-group col">
                <label class="text-muted">性別</label class="text-muted">
                <div class="custom-control custom-radio ">
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

                <div class="custom-control custom-radio ">
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

              <div class="form-group col-10 col-md-7 col-lg-5 mt-5">
                <label class="text-muted">出身地</label class="text-muted">
                <select type="text" name="birthplace" class="form-control">
                    @foreach(config('prefecture') as $key => $name)
                      <option value="{{ $name }}"
                      <?php
                        if(!empty($user->birthplace)) {
                          if($user->birthplace == $name) {
                            echo 'selected';
                          }
                        }
                      ?>
                      >
                      {{ $name }}
                      </option>
                    @endforeach
                </select>
              </div>

              <div class="form-group col-8 col-md-6 col-lg-3 mt-5">
                <label class="text-muted">身長</label class="text-muted">
                <div>
                  <input type="number" name="height" id="height" class="col-7" value="{{ $user->height ?? old('height') }}">cm
                </div>
              </div>

              <div class="form-group col-8 col-md-6 col-lg-3 mt-5">
                <label class="text-muted">体重</label class="text-muted">
                <div>
                  <input type="number" name="weight" id="weight" class="col-7" value="{{ $user->weight ?? old('weight') }}">kg
                </div>
              </div>

              

              <div class="form-group col mt-5">
                <label class="text-muted">趣味</label class="text-muted">
                <input type="text" name="hobby" class="form-control" value="{{ $user->hobby ?? old('hobby') }}">
              </div>

              

              <div class="form-group col mt-5">
                <label class="text-muted">特技、資格</label class="text-muted">
                <input type="text" name="skill" class="form-control" value="{{ $user->skill ?? old('skill') }}">
              </div>

              <div class="form-group col mt-5">
                <label class="text-muted">学歴</label class="text-muted">
                <input type="text" name="background" class="form-control" value="{{ $user->background ?? old('background') }}">
              </div>

              <div class="form-group col mt-5">
                <label class="text-muted">影響を受けたもの</label class="text-muted">
                <input type="text" name="influence" class="form-control" value="{{ $user->influence ?? old('influence') }}">
              </div>

              <div class="form-group col  mt-5">
                <label class="text-muted">Youtubeチャンネル</label class="text-muted">
                <input type="url" name="youtube" class="form-control" value="{{ $user->youtube ?? old('youtube') }}">
              </div>

              <div class="form-group  col mt-5">
                <label class="text-muted">Twitterアカウント</label class="text-muted">
                <input type="url" name="twitter" class="form-control" value="{{ $user->twitter ?? old('twitter') }}">
              </div>

              <div class="form-group col mt-5">
                <label class="text-muted">ブログURL</label class="text-muted">
                <input type="url" name="blog" class="form-control" value="{{ $user->blog ?? old('blog') }}">
              </div>
              
              <div class="d-flex justify-content-center my-3">
                <input type="submit" class="btn btn-light-green mt-5 px-5" value="更新">
              </div>
          
            </div> 

        </div>
      </div>
      
  </form> 
  @include('footer')
@endsection

