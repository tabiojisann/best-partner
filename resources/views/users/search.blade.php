@extends('app')

@section('title', 'ユーザー検索')

@section('content')
  @include('nav')

  @include('articles.tabs', ['hasArticles' => false, 'hasUsers' => true])

  <div class="row lime lighten-5">
    <div class="container text-center mt-5 mb-5">
      <h1>検索条件を絞り込み</h1>
      <div class="border border-info p-5 m-5">
        <form action="{{ route('users.search') }}" method="GET">

            <select name="sex" class="browser-default custom-select w-25 mb-3" value="" id="">
              <option selected value="">性別</option>
              <option value="1">男性</option>
              <option value="2">女性</option>
            </select>

            <div class="input-group md-form d-flexjustify-content-around">
              <div class="input-group-prepend ">
                <span class="input-group-text amber lighten-2" id="basic-text1">
                  <i class="fas fa-search text-white" aria-hidden="true"></i>
                </span>
              </div>
              
              <input class="form-control w-25 mr-5" type="text" name="keyword_back" placeholder="学歴" aria-label="Search" value="{{ $keyword_back }}">
              
              <div class="input-group-prepend ml-5">
                <span class="input-group-text amber lighten-2" id="basic-text1">
                  <i class="fas fa-search text-white" aria-hidden="true"></i>
                </span>
              </div>
                
              <input class="form-control w-25 " type="text" name="keyword_birth" placeholder="出身地" aria-label="Search" value="{{ $keyword_birth }}">
            </div>
            
         
              <div class="md-form  mt-0">
                <input type="number" name='age' id="age" class="form-control w-25 d-inline">
                <label for="age">年齢</label>
                <b>以上</b>
              </div>


          


            <button type="submit" class="btn btn-default col-md-5">検索</button>
        </form>
      </div>

    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->name }}</p>

<!-- 
    @if(!empty($keyword_birth))
      @if($users->count())
        @foreach($users as $user)
          <a href="{{ route('users.show', ['user' => $user]) }}" class="d-block animated fadeIn slow">
            <img src="{{ $user->image ?: asset('logo/user.jpg') }}"  class="d-inline rounded-circle" height="50" width="45"  alt="">
            <b>{{ $user->name }}</b>
            <b>{{ $user->sex }}</b>
            <b>{{ $user->age }} 才</b>
            <b>{{ $user->background }} </b>
            <b>{{ $user->birthplace }} </b>
          </a>
          <br>
        @endforeach
      @else
        <p>見つかりませんでした</p>
      @endif
    @else
      <p>検索キーワードを入れてください</p>
    @endif  -->


    </div>
  </div>

  @include('footer')
@endsection



