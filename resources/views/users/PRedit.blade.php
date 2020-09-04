@extends('app')

@section('title', 'PR編集')

@section('content')
  @include('nav')

  <form method="POST" action="{{ route('users.PRupdate', ['user' => $user]) }}">
    @method('PATCH')
    @csrf

    @include('errors')
  
  <div class="container mb-5" style="max-width: 100%;">
      <div class="row border-top">
        <!-- <div class="d-flex justify-content-center">
          <div class="col-5 mt-5 mr-5">
            <div class="form-group shadow-textarea">
              <textarea name="PR" id="PR" cols="70" rows="30" class="form-control z-depth-2">{{ $user->PR }}</textarea>
            </div>
          </div> -->
          <div class="col-5 mt-5 ml-5">
            <div class="form-group shadow-textarea">
              <textarea name="PR" id="PR" cols="70" rows="30" class="form-control z-depth-2">{{ $user->PR }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-info px-5 mb-5" value="更新">
      </div>

  </div> 
  </form>   
        
  @include('footer')
@endsection