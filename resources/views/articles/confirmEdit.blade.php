@extends('app')

@section('title', '編集確認画面')

@section('content')
  @include('nav')
    <div class="text-center mt-3">
      <h2>この内容で記事を更新しますか？</h2>
      <form action="{{ route('articles.sendPatch', ['article' => $article]) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" value="{{ $article }}" name="{{ $article }}" readonly="true">
        <button type="submit" class="btn tempting-azure-gradient text-white">はい</button>
      </from>
    </div>

    @include('articles.showCard')
  @include('footer')
@endsection
