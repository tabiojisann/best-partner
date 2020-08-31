<div class="bg heavy-rain-gradient">
  <div class="container">
    <div class="row" >
      <div class="col-12">
        <div class="card mt-5 mb-5">
          <div class="card-body pt-0">
            <div class="article-user mt-3">
              <img src="{{ $article->user->image ?: asset('logo/user.jpg') }}" class="d-inline rounded-circle" width="50" height="45" alt="">
              @if(Auth::id() === $article->user_id)
                <b class="text-danger">{{ $article->user->name}}</b>
              @else
                <b class="text-info">{{ $article->user->name}}</b>
              @endif

            </div>

            <div class="border"></div>

            <div class="view overlay mt-3">
              <img class="card-img-top" src="{{ $article->image ?: asset('logo/NoImage.jpg') }}" height="500" alt="photo">
            </div>

            <h1 class="text mt-5 border-bottom text-center">{!! nl2br(e($article->title)) !!}</h1>
           
            <table class="table table-bordered col-6 offset-3 mt-5">
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

            <div class="container">
              <div class="row mt-5 border-top">
                <div class="col-8 offset-2 mt-2">
                  <p  class="mt-4">{!! nl2br(e($article->text))!!}</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>