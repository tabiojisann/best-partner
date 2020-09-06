@extends('app')

@section('title', '投稿確認画面')

@section('content')
  @include('nav')
    <div class="text-center mt-3">
      <h2>この内容で募集をかけますか？</h2>
      <form action="{{ route('articles.send', ['article' => $article]) }}" method="post">
        @csrf
        <input type="hidden" value="{{ $article }}" name="{{ $article }}" readonly="true">
        <button type="submit" class="btn blue-gradient">はい</button>
      </from>
    </div>

    @include('articles.showCard')
  @include('footer')
@endsection
