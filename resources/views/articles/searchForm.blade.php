<form action="{{ route('articles.search') }}" method="GET">

  <div class="input-group form-sm form-1 pl-0">
    <div class="input-group-prepend ">
      <span class="input-group-text young-passion-gradient lighten-3" id="basic-text1"><i class="fas fa-search text-white"
          aria-hidden="true"></i></span>
    </div>
    <input class="form-control my-0 py-1" type="text" name="keyword" placeholder="Search" aria-label="Search" value="{{ $keyword ?? old('keyword') }}">
  </div>

  <select name="style" class="browser-default custom-select " value="" id="">
    <option value="disabled" class="d-none">選択してください</option>
    <option value="1">漫才</option>
    <option value="2">コント</option>
    <option value="3">その他</option>
  </select>

  <select name="position" class="browser-default custom-select" value="" id="">
    <option value="disabled" class="d-none">選択してください</option>
    <option value="1" >ボケ</option>
    <option value="2">ツッコミ</option>
    <option value="3">その他</option>
  </select>

  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-default">検索</button>
  </div>

</form>


