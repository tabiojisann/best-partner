@extends('app')

@section('title', 'ユーザー検索')

@section('content')
  @include('nav')

  @include('articles.tabs', ['hasArticles' => false, 'hasUsers' => true])


  <div class="row lime lighten-5">
    <div class="container col-7">
      
      <div class="border border-info p-5 m-5">
        <form action="{{ route('users.search') }}" method="GET">

          <select name="sex" class="browser-default custom-select w-25 mb-3" value="" id="">
            <option selected value="">性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
          </select>

          <div class="input-group md-form w-75 ">
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
          
        
          <div class="md-form d-flex justify-content-start mt-0">
            <label for="age">年齢</label>

            <input type="number" name='age_lower' id="age" class="form-control w-25 ">
            <b class="mt-5 mx-4">以上</b>

            <input type="number" name='age_upper' id="age" class="form-control w-25 ">
            <b class="mt-5 ml-4">以下</b>
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-default w-25">検索</button>
          </div>

        </form>
      </div>
    </div>
    
    <div class="container col-5 mt-5 pb-5 text-center animated fadeIn">
      @if(!empty($sex || $keyword_birth || $keyword_back || $age_upper || $age_lower))
        @if($users->count())
          @foreach($users as $user)
          <a href="{{ route('users.show', ['user' => $user]) }}" class="d-block animated fadeIn slow">
            <img src="{{ $user->image ?: asset('logo/user.jpg') }}"  class="d-inline rounded-circle" height="50" width="45"  alt="">
            <p>{{ $user->name }}</p>
            <p>{{ $user->sex }}</p>
            <b>{{ $user->age }} 才</b>
          </a>
          @endforeach
        @else
        <p class="mt-5">条件に合致するユーザーが見つかりませんでした</p>
        @endif
      @else
        <p class="mt-5">条件を最低1項目入力してください</p>
      @endif
    </div>
  
  </div>

  @include('footer')
@endsection



