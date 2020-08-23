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