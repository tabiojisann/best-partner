@extends('app')

@section('title', 'PR編集')

@section('content')
  @include('nav')

  <form method="POST" action="{{ route('users.PRupdate', ['user' => $user]) }}">
    @method('PATCH')
    @csrf

    @include('errors')
    <div class="container mb-5" style="max-width: 100%;">
      <user-textarea
      v-bind:user="{{json_encode($user->PR)}}">
      </user-textarea>
    </div>
  </form>   

        
  @include('footer')
@endsection