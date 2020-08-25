@extends('app')

@section('title', 'ユーザー検索')

@section('content')
  @include('nav')

  @include('articles.tabs', ['hasArticles' => false, 'hasUsers' => true])

  <div class="row lime lighten-5">
    <div class="container text-center mt-5 mb-5">


    <form action="{{ route('users.search') }}" method="GET">
      <!-- <input class="form-control" type="text" name="keyword" placeholder="Search" aria-label="Search" value="{{ $keyword }}"> -->
        <select name="sex" class="browser-default custom-select" value="" id="">
          <option selected value="">性別</option>
          <option value="男性">男性</option>
          <option value="女性">女性</option>
        </select>
      <p><input type="submit" value="検索"></p>
    </form>



   @if($users->count())
    @foreach($users as $user)
        <p>{{ $user->name }}</p>
        <p>{{ $user->sex }}</p>
    @endforeach
   @endif

    <!-- @if(!empty($keyword))
      @if($users->count())
        @foreach($users as $user)
          <a href="{{ route('users.show', ['user' => $user]) }}" class="d-block animated fadeIn slow">
            <img src="{{ $user->image ?: asset('logo/NoImage.jpg') }}"  class="d-inline rounded-circle" height="50" width="45"  alt="">
            <b>{{ $user->name }}</b>
          </a>
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



