<!-- Footer -->
<footer class="page-footer font-small border-top">
 
  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

       <div class="col-md-3 pt-3" >
         <a class="" href="/">  
          <img src="{{ asset('logo/lookforp.png') }}" width="200" border="0" class=" horizontal">
         </a>

         <p class="mt-2 text-muted">To find the best partner</p>
         <!--Facebook-->
         <a class="icons-sm fb-ic"><i class="fab fa-facebook-f fa-2x indigo-text"> </i></a>
         <!--Twitter-->
         <a class="icons-sm tw-ic"><i class="fab fa-twitter fa-2x blue-text"> </i></a> 
       </div>


      <!-- Grid column -->
      <div class="col-md-3 mx-auto ">

        <!-- Links -->
        <h5 class="font-weight-bold mt-3 mb-4 text-dark">About</h5>

        <ul class="list-unstyled">
          <li class="my-2 ">
            <a href="#!" class="text-dark">利用規約</a>
          </li>
          <li  class="my-2">
            <a href="#!" class="text-dark">プライバシー</a>
          </li>
          <li class="my-2">
            <a href="#!" class="text-dark">ヘルプ</a>
          </li>
          <li class="my-2">
            <a href="#!" class="text-dark">お問い合わせ</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mx-auto ">
        <!-- Links -->
        <h5 class="font-weight-bold mt-3 mb-4 text-dark">ToUse</h5>

        <ul class="list-unstyled">
          @if( !Auth::check())
            <li class="my-2">
              <a href="{{ route('register') }}" class="text-dark">会員登録</a>
            </li>
            <li  class="my-2">
              <a href="{{ route('login') }}" class="text-dark">ログイン</a>
            </li>
          @endif
          @if( Auth::check() )
            <li  class="my-2">
              <a href="" class="text-dark" form="logout"
                  onclick="event.preventDefault();
                            document.getElementById('logout').submit();">
              ログアウト
              </a>
            </li>

            <form action="{{ route('logout') }}" method="post" id="logout">
              @csrf
            </form>

          @endif
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Copyright:
    <a href="http://www.lookforp.com/"> © 2020 lookforp inc.</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->