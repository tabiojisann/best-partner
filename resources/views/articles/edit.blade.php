@extends('app')

@section('title', '更新画面')

@section('content')
@include('nav')
  <div class="container py-5">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('errors')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @include('articles.form')
                <button type="submit" class="btn btn-light-green btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection