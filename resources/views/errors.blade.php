@if ($errors->any())
  <ul>
    @foreach($errors->all() as $error)
      <li class="text-danger" style="list-style: none;">{{ $error }}</li>
    @endforeach
  </ul>
@endif