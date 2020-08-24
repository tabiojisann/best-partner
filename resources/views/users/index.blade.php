@extends('app')

@section('title', 'ユーザー検索')

@section('content')
  @include('nav')

  @include('articles.tabs')

  <div class="row lime lighten-5">
    <div class="container text-center  mt-5 mb-5">
      @foreach($users as $user)
        <p>{{ $user->name }}</p>
      @endforeach
    </div>
  </div>

  @include('footer')
@endsection

