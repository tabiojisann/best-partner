<div class="card mt-5 mx-2 article_card">

  <div class="m-1 d-flex justify-content-between ">
    <div class="d-inline">
        @if(Auth::id() === $article->user_id)
        <a href="{{ route('users.edit', $article->user_id) }}">
          <img src="{{ $article->user->image ?: asset('logo/user.jpg') }}"  height="50" width="45" class="rounded-circle"  alt="">
          <p class="text-danger d-inline">{{ $article->user->name }}</p>
        </a> 
        @else
        <a href="{{ route('users.show', $article->user_id) }}">
          <img src="{{ $article->user->image ?: asset('logo/user.jpg') }}"  height="50" width="45" class="rounded-circle"  alt="">
          <p class="text-info d-inline">{{ $article->user->name }}</p>
        </a> 
        @endif 
    </div>

    @if(Auth::id() === $article->user_id)
      <h2 class="text-right m-1 ">
        <a href="{{ route('articles.edit', ['article' => $article]) }}" class="">
          <i class="fas fa-edit text-primary"></i>
        </a>

        <!--  Modal Trigger-->
        <a type="button" class="text-danger" data-toggle="modal" data-target="#sideModalTR">
          <i class="fas fa-trash-alt text-danger"></i>
        </a>
        <!--  Modal Trigger-->
      </h2>

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
  </div>

  <span class="border"></span>
    
  <div class="">
    @if(isset($article->image))
      <img class="card-img-top" src="{{ $article->image }}" width="978" height="378" alt="Card image cap">
    @endif
    <a href="{{ route('articles.show', ['article' => $article]) }}">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>



  <span class="border"></span>

  <div class="card-body">
    <div class="row">            
    <div class="col-12">
      <h3 class="card-title">{{ $article->title }}</h3>

      <table class="table table-bordered col col-lg-8">
        <tbody class="">

          <tr>
            <th class="blue-grey lighten-5 text-left ">
              <i class="fas fa-map-marker-alt text-info"></i>
                ポジション
            </th>
            <th style="width:50%" class="text-left">{{ $article->position }}</th>
          </tr>

          <tr>
            <th class="blue-grey lighten-5 text-left">
              <i class="fas fa-briefcase text-default"></i>
                スタイル
            </th>
            <th style="width:50%" class="text-left">{{ $article->style }}</th>
          </tr>

        </tbody>
      </table>

      <p class="text-muted indexText">{{ $article->text }}</p>

      <article-keep
      :initial-is-keep='@json($article->isKeep(Auth::user()))'
      :initial-count-keeps='@json($article->count_keeps)'
      :authorized='@json(Auth::check())'
      endpoint="{{ route('articles.keep', ['article' => $article]) }}"
      >
      </article-keep>

      <a href="{{ route('articles.show', ['article' => $article]) }}" class="btn btn-mdb-color px-4">
        <i class="fas fa-align-justify text-info">   </i>  詳細
      </a>

      <p class="float-right mt-4 text-muted">{{ $article->created_at->format('Y年 n月 j日 / H:i') }}</p>
    </div>
    </div> 
  </div>
</div>