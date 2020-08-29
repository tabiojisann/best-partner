@if ($errors->has('name'))
  <ul>
    <li class="text-danger">{{ $errors->first('name') }}</li>
  </ul>
@endif
@if ($errors->has('email'))
  <ul>
    <li class="text-danger">{{ $errors->first('email') }}</li>
  </ul>
@endif

