<ul class="nav nav-tabs nav-justified mt-3" id="top" role="tablist">
  <li class="nav-item">
    <a   href="{{ route('users.edit', ['user' => $user]) }}"  class="nav-link 
              {{ $hasShow ? 'active morpheus-den-gradient
                                 text-white animated fadeIn' 
                              : 'text-muted' }}" >
      マイページ
    </a> 
  </li>


  <li class="nav-item">
    <a  href="{{ route('users.articles', ['user' => $user]) }}"  class="nav-link 
    {{ $hasMyArticles ? 'active morpheus-den-gradient
                    text-white animated fadeIn' 
                  : 'text-muted' }}">
      募集した記事
    </a>
  </li>
  
</ul>