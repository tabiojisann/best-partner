<ul class="nav nav-tabs nav-justified mt-3" id="top" role="tablist">
  <li class="nav-item">
    <a   href="{{ route('articles.index') }}"  class="nav-link 
              {{ $hasArticles ? 'active morpheus-den-gradient
                                 text-white animated fadeIn' 
                              : 'text-muted' }}" >
      募集一覧
    </a> 
  </li>
  <li class="nav-item">
    <a  href="{{ route('users.search') }}"  class="nav-link 
    {{ $hasUsers ? 'active morpheus-den-gradient
                    text-white animated fadeIn' 
                  : 'text-muted' }}">
      ユーザー検索
    </a>
  </li>
</ul>




