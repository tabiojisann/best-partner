<!-- PC -->
<ul class="nav nav-tabs nav-justified mt-3 Mobile" id="top" role="tablist">
  <li class="nav-item">
    <a   href="{{ route('articles.index') }}"  class="nav-link 
              {{ $hasArticles ? 'active morpheus-den-gradient
                                 text-white animated fadeIn' 
                              : 'text-muted' }}" >
      募集をみる
    </a> 
  </li>

  <li class="nav-item">
    <a  href="{{ route('users.search') }}"  class="nav-link 
    {{ $hasUsers ? 'active morpheus-den-gradient
                    text-white animated fadeIn' 
                  : 'text-muted' }}">
      人材を探す
    </a>
  </li>

  <li class="nav-item">
    <a  href="{{ route('users.keep', ['user' => $user]) }}"  class="nav-link 
    {{ $hasKeeps ? 'active morpheus-den-gradient
                    text-white animated fadeIn' 
                  : 'text-muted' }}">
      気になるリスト
    </a>
  </li>
</ul>
<!-- PC -->

<!-- Mobile -->
<div class="row Desk">

  <div class="col">

    <nav class="nav flex-column lighten-3 m-3 py-4 mb-r z-depth-1 text-center">

      <a   href="{{ route('articles.index') }}"  class="nav-link 
                {{ $hasArticles ? 'active morpheus-den-gradient
                                  text-white animated fadeIn' 
                                : 'text-muted' }}" >
        募集をみる
      </a> 

      <a  href="{{ route('users.search') }}"  class="nav-link 
      {{ $hasUsers ? 'active morpheus-den-gradient
                      text-white animated fadeIn' 
                    : 'text-muted' }}">
        人材を探す
      </a>

      <a  href="{{ route('users.keep', ['user' => $user]) }}"  class="nav-link 
      {{ $hasKeeps ? 'active morpheus-den-gradient
                      text-white animated fadeIn' 
                    : 'text-muted' }}">
        気になるリスト
      </a>
    </nav>
  </div>
</div>
<!-- Mobile -->





