@extends('app')

@section('title', 'Best Partner')

@section('content')
  @include('nav')



  @guest
    <div class="text-center peach-gradient" style="height: 500px;">
      <img src="https://s3.amazonaws.com/lg-vectors/bitmaps/206127/721602.png?logo_version=0" width="500" border="0" class="horizontal animated fadeInRight slower">
      <h1 class="text-white mt-5 animated fadeInLeft slower">俺とコンビ組まない?</h1>
      <a href="{{ route('register') }}">
        <h2 class="text-success mt-4 animated fadeIn delay-4s">はい</h2>
      </a>
    </div>
  @endguest
 

  <div class="row  lime lighten-5">
    <div class="card border-light col-3 offset-1 my-5" style="max-height: 440px;">
      <p class="card-header">検索</p>
      <div class="card-body">
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
          <label class="custom-control-label" for="defaultGroupExample1">Option 1</label>
        </div>

        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
          <label class="custom-control-label" for="defaultGroupExample2">Option 2</label>
        </div>

       
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
          <label class="custom-control-label" for="defaultGroupExample3">Option 3</label>
        </div>

        <form class="form-inline mr-auto mt-5">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
        </form>
      </div>
    </div>

    <!-- 記事一覧 -->

    <div class="col-6 offset-1 pb-5">
      @foreach($articles as $article)
        <div class="card mt-5">
        

        @if(Auth::id() === $article->user_id)
          <h2 class="text-right mr-3">
            <a href="{{ route('articles.edit', ['article' => $article]) }}" class="">
              <i class="fas fa-edit text-primary"></i>
            </a>

            <!--  Modal Trigger-->
            <a type="button" class="text-danger" data-toggle="modal" data-target="#sideModalTR">
              <i class="fas fa-trash-alt text-danger"></i>
            </a>
            <!--  Modal Trigger-->
          </h2>

          <span class="border border-bottom"></span>

          <!-- Modal -->
          <div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">

            
            <div class="modal-dialog modal-side modal-top-right" role="document">

            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  この記事を削除します。本当によろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">いいえ</button>
                  <button type="submit" class="btn btn-danger">はい</button>
                </div>
              </div>
            </form>
            
            </div>
          </div>
          <!-- Modal -->

        @endif

         

    

          <div class="view overlay">
            @if(isset($article->image))
              <img class="card-img-top" src="{{ $article->image }}" alt="Card image cap">
            @endif
            <a href="{{ route('articles.show', ['article' => $article]) }}">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <div class="card-body">

          
            
              <div class="float-right">
           
                <p class="ml-4">
                  <img src="{{ $article->user->image }}"  height="40" width="45" class="rounded-circle"  alt="">
                </p>

                @if(Auth::id() === $article->user_id)
                  <p class="text-danger">{{ $article->user->name }}</p>
                @else
                  <p class="text-info">{{ $article->user->name }}</p>
                @endif  

              </div>
        
                  

            <h3 class="card-title">{{ $article->title }}</h3>

            <table class="table table-bordered">
              <tbody>

                <tr>
                  <th style="width:20%" class="blue-grey lighten-5 text-left">
                    <i class="fas fa-map-marker-alt text-info" class=""></i>
                      募集ポジション
                  </th>
                  <th style="width:50%" class="text-left">{{ $article->position }}</th>
                </tr>

                <tr>
                  <th style="width:20%" class="blue-grey lighten-5 text-left">
                    <i class="fas fa-briefcase text-default"></i>
                      募集スタイル
                  </th>
                  <th style="width:50%" class="text-left">{{ $article->style }}</th>
                </tr>

              </tbody>
            </table>



            <button type="button" class="btn btn-success px-5"><i class="fas fa-star text-warning mr-1"></i>気になる</button>
            <a href="{{ route('articles.show', ['article' => $article]) }}" class="btn btn-mdb-color px-5">
              <i class="fas fa-align-justify text-info">   </i>  詳細
            </a>

            <p class="float-right mt-4">{{ $article->created_at->format('Y年 n月 j日 / H:i') }}</p>

          </div>
        </div>
      @endforeach

      
    </div>
  </div>



  @include('footer')



@endsection




