@extends('app')

@section('title', 'ユーザー検索')

@section('content')
  @include('nav')

  @include('articles.tabs', ['hasArticles' => false, 'hasUsers' => true, 'hasKeeps' => false])


  <div class="row cloudy-knoxville-gradient">
    <div class="container col-12 col-lg-6">
      
      <div class="border border-info p-5 m-3">
        <form action="{{ route('users.search') }}" method="GET">
          
          <select name="sex" class="browser-default custom-select w-100 mb-3" value="" id="">
            <option selected value="">性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
          </select>

          <div class="input-group form-group w-100">
            <div class="input-group-prepend">
              <span class="input-group-text amber lighten-2" id="basic-text1">
                <i class="fas fa-search text-white" aria-hidden="true"></i>
              </span>
            </div>
            <input class="form-control w-75" type="text" name="keyword_back" placeholder="学歴" aria-label="Search" value="{{ $keyword_back }}">
          </div>

          <div class="input-group form-group w-100 my-3">
            <div class="input-group-prepend">
              <span class="input-group-text tempting-azure-gradient lighten-2" id="basic-text2">
                <i class="fas fa-search text-white" aria-hidden="true"></i>
              </span>
            </div> 
            <input class="form-control w-75 " type="text" name="keyword_birth" placeholder="出身地" aria-label="Search" value="{{ $keyword_birth }}">
          </div>
        
      
          <!-- <div class="md-form d-flex justify-content-start mt-0"> -->
          <div class="md-form mt-0">
            <label for="age">年齢</label>

            <input type="number" name='age_lower' id="age" class="form-control w-50 d-inline">
            <b class="mt-5 mx-4">以上</b>

            <input type="number" name='age_upper' id="age" class="form-control w-50 d-inline">
            <b class="mt-5 ml-4">以下</b>
          </div>

          <div class=" d-flex justify-content-center">
            <button type="submit" class="btn btn-default w-100">検索</button>
          </div>

        </form>
      </div>
    </div>
    
    <div class="container col-12 col-lg-6 px-5 my-3 text-center animated fadeInRight">
      @if(!empty($sex || $keyword_birth || $keyword_back || $age_upper || $age_lower) && $age_lower >= 0)
        @if($users->count())
          @foreach($users as $user)
          <a href="{{ route('users.show', ['user' => $user]) }}" class="d-block animated fadeIn slow">
            
            <table class="table table-bordered Mobile">
              <thead>
                <tr>
                  <th></th>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">性別</th>
                  <th class="th-sm">年齢</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class=""><img src="{{ $user->image ?: asset('logo/user.jpg') }}"  class="d-inline rounded-circle" height="40" width="40"  alt=""></td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->sex }}</td>
                  <td>{{ $user->age }}</td>
                </tr>
              </tbody>
            </table>

            <table class="table table-bordered Desk">
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class=""><img src="{{ $user->image ?: asset('logo/user.jpg') }}"  class="d-inline rounded-circle" height="40" width="40"  alt=""></td>
                  <td>{{ $user->name }}</td>
                </tr>
              </tbody>
            </table>

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



