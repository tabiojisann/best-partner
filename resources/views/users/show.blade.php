@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
    <div class="container winter-neva-gradient" style="max-width: 100%;">
   
      <div class="row">

        <div class="col-5 offset-1 mt-5 pb-5">
          <div class="view overlay">
            <img class="card-img-top" src="{{ $user->image ?: asset('logo/NoImage.jpg') }}"  alt="photo">
            <div class="mask rgba-white-slight"></div>
          </div>
        </div>

        <div class="col-4 offset-1 mt-5">

          <div class="name pb-5 d-flex justify-content-between">
            <h1 class="">{{ $user->name }}</h1>

            @if( Auth::id() === $user->id )
              <a href="{{ route('users.edit', ['user' => $user]) }}" class="h3 ml-3"><i class="fas fa-user-edit text-primary"></i></i></a>
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

          <table class="table">
        
            <thead>
              
              @if(!empty($user->birthday))
              <tr>
                <th style="width:30%" >生年月日</th>
                <th >{{  $user->birthday->format('Y年 n月 j日') }}</th>
              </tr>
              @endif
        
              @if(!empty($user->sex))
              <tr>
                <th style="width:30%" >性別</th>
                <th >{{ $user->sex }}</th>
              </tr>
              @endif

              @if(!empty($user->birthplace))
              <tr>
                <th style="width:30%" >出身地</th>
                <th >{{ $user->birthplace }}</th>
              </tr>
              @endif


              @if(!empty($user->height))
              <tr>
                <th style="width:30%" >身長</th>
                <th>
                  <?php 
                    echo  $user->height . ' ' . 'cm';
                  ?>
                </th>
              </tr>
              @endif
 
              @if(!empty($user->weight)) 
              <tr>
                <th style="width:30%" >体重</th>
                <th>
                  <?php 
                    echo  $user->weight . ' ' . 'kg';
                  ?>
                </th>
              </tr>
              @endif

              @if(!empty($user->hobby))
              <tr>
                <th style="width:30%" >趣味</th>
                <th >{{ $user->hobby }}</th>
              </tr>
              @endif


              @if(!empty($user->skill))
              <tr>
                <th style="width:30%" >特技、資格</th>
                <th >{{ $user->skill }}</th>
              </tr>
              @endif

              @if(!empty($user->background))
              <tr>
                <th style="width:30%" >学歴</th>
                <th >{{ $user->background }}</th>
              </tr>
              @endif

              @if(!empty($user->influence))
              <tr>
                <th style="width:35%" >影響を受けた人物</th>
                <th >{{ $user->influence }}</th>
              </tr>
              @endif

              @if(!empty($user->youtube))
              <tr>
                <th style="width:35%" >youtubeチャンネル</th>
                <th >{{ $user->youtube }}</th>
              </tr>
              @endif

              @if(!empty($user->twitter))
              <tr>
                <th style="width:35%" >ツイッター</th>
                <th >{{ $user->twitter }}</th>
              </tr>
              @endif

              @if(!empty($user->blog))
              <tr>
                <th style="width:35%" >ブログ</th>
                <th >{{ $user->blog }}</th>
              </tr>
              @endif

            </thead>
          </table>
        </div>
      </div>
    </div> 

    <div class="container mb-5 mt-3 " style="max-width: 100%;">
      <div class="row border-top">
        <div class="col-8 offset-2 mt-1">
          <div class="text">
            {!! nl2br(e($user->PR)) !!}
          </div>
        </div>
      </div>
    </div>
  @include('footer')
@endsection








