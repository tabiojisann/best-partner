@extends('app')

@section('title', $user->name . 'の気になるリスト')


@section('content')
  @include('nav')

  @include('top')
  
  @include('articles.tabs', ['hasArticles' => false, 'hasUsers' => false, 'hasKeeps' => true])
    @foreach($articles as $article)
      <div class="container my-5">
        <div class="row">
          <div class="col-12">
            @include('articles.card')
          </div>
        </div>
      </div>
    @endforeach
  @include('footer')

@endsection