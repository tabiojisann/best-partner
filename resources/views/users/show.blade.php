@extends('app')

@section('title', 'マイページ')

@section('content')
  @include('nav')
    <div class="container rgba-grey-slight" style="max-width: 100%;">
   
      <div class="row">


        <div class="col-5 offset-1 mt-5 pb-5">
          <div class="view overlay">
            @if(isset($user->image))
              <img class="card-img-top" src="{{ $user->image }}"  alt="photo">
            @else
              <img src="{{ asset('logo/NoImage.jpg') }}" width="400" alt="">
            @endif
              <div class="mask rgba-white-slight"></div>
          </div>
        </div>

        <div class="col-4 offset-1 mt-5">

          <div class="name pb-5">
            <h1 class="d-inline">{{ $user->name }}</h1>

            @if( Auth::id() === $user->id )
              <a href="{{ route('users.edit', ['user' => $user]) }}" class="h3 ml-3"><i class="fas fa-edit text-primary"></i></a>
            @endif

            <p class="ml-2">{{ $user->name }}</p>
          </div>

          <table class="table">
        
            <thead>
  
              <tr>
                <th style="width:30%" >生年月日</th>
                <th >{{ $user->birthday->format('Y年 n月 j日') }}</th>
              </tr>
              
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

    <div class="container mb-5 " style="max-width: 100%;">
      <div class="row border-top">
        <div class="col-8 offset-2 mt-5">
          <div class="text">
            {!! nl2br(e($user->PR)) !!}
          </div>
        </div>
      </div>
    </div>
  @include('footer')
@endsection








