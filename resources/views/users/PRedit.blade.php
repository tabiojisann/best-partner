@extends('app')

@section('title', 'PR編集')

@section('content')
  @include('nav')

  <form method="POST" action="{{ route('users.PRupdate', ['user' => $user]) }}">
    @method('PATCH')
    @csrf

    @include('errors')
    <div class="container my-1" style="max-width: 100%;">
      <user-textarea
      v-bind:user="{{json_encode($user->PR)}}"
      v-bind:mark-body="{{json_encode($user->mark_body)}}">
      </user-textarea>
    </div>
  </form>   
 
@endsection