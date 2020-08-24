<ul class="nav nav-tabs nav-justified mt-3" id="top" role="tablist">
  <li class="nav-item">
    <a  class="nav-link text-muted {{ 'id=article-tab' ? 'active' : '' }}" role="tab" id="article-tab"  href="/" 
     aria-controls="article"  aria-selected="true">
      募集一覧
    </a> 
  </li>
  <li class="nav-item">
    <a  class="nav-link text-muted {{ 'id=user-tab' ? 'active' : '' }}" role="tab" id="user-tab" href="{{ route('users.index') }}" 
    aria-controls="user"  aria-selected="false">
        ユーザー検索
    </a>
  </li>
</ul>






