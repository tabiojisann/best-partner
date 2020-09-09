@extends('app')

@section('title', $user->name . 'のプロフィール')

@section('content')
  @include('nav')

  @include('flash')
  
  
    @include('users.tabs',['hasShow' => true, 'hasMyArticles' => false])


    <div class="container cloudy-knoxville-gradient" style="max-width: 100%;">
      @include('errors')

      <div class="row">

        <div class="col-12 col-md-5 offset-md-1 mt-5 pb-5">
          

            <div class="view overlay">
              <img class="card-img-top" src="{{ $user->image ?: asset('logo/NoImage.jpg') }}"  alt="photo">
            </div>

        </div>

        <div class="col-12 col-md-4 offset-md-1 mt-5">

          <div class="name d-flex justify-content-between">
            <h2 class="">{{ $user->name }}</h2>

            @if( Auth::id() === $user->id )
              <a href="{{ route('users.profileEdit', ['user' => $user]) }}" class="h3 ml-3"><i class="fas fa-user-edit text-primary"></i></i></a>
            @endif

            @if( Auth::id() !== $user->id )
              <follow-button
               class="ml-auto"
               :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
               :authorized='@json(Auth::check())'
               endpoint="{{ route('users.follow', ['user' => $user]) }}"
               >
               </follow-button>
            @endif
          </div>
         
          <div class="pb-5">

            @if(!empty($user->youtube))
              <a type="button" href="{{ $user->youtube }}" class="btn-floating btn-lg"><i class="fab fa-youtube red-text h2"></i></a>
            @endif

            @if(!empty($user->twitter))
              <a type="button" href="{{ $user->twitter }}" class="btn-floating btn-lg "><i class="fab fa-twitter-square blue-text h2"></i></a>
            @endif

            @if(!empty($user->blog))
              <a type="button" href="{{ $user->blog }}" class="btn-floating btn-lg mb-2"><img src="{{ asset('logo/blog.jpg') }}" width="35"  alt=""></a>
            @endif
    
          </div>

          @include('users.profile')
        </div>
      </div>
    </div> 

 
 
    <div class="container mb-5 mt-3" style="max-width: 100%;">
 
      <div class="row">

        <div class="col-12 col-md-8 offset-md-2 mt-1">
 
          <div class="text border p-5">
          @if( Auth::id() === $user->id )
      <a href="{{ route('users.PRedit', ['user' => $user]) }}" class="float-right h3 ml-3"><i class="fas fa-user-edit text-primary"></i></i></a>
          @endif
            {!! nl2br(($user->mark_body)) !!}
          </div>
        </div>
      </div>
    </div>
  @include('footer')
@endsection








