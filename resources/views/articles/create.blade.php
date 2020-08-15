@extends('app')

@section('title', '記事投稿')

@section('content')
  @include('nav')
  <div class="container mb-5">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('errors')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @include('articles.form')
                <button type="submit" class="btn btn-indigo btn-block">投稿する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @include('footer')
@endsection