@extends('app')

@section('title', $user->name . 'さんが募集した記事')

@section('content')
  @include('nav')

  @include('users.tabs', ['hasShow' => false, 'hasMyArticles' => true])
  
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




