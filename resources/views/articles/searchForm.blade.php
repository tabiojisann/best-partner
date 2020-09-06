<form action="{{ route('articles.search') }}" method="GET">
  <div class="d-flex flex-column sidebar-fixed">
    <div class="input-group form-sm form-1 pl-0 mt-3 p-3">
      <div class="input-group-prepend ">
        <span class="input-group-text young-passion-gradient lighten-3" id="basic-text1"><i class="fas fa-search text-white"
            aria-hidden="true"></i></span>
      </div>
      <input class="form-control my-0 py-1" type="text" name="keyword" placeholder="キーワードで検索" aria-label="Search" value="{{ $keyword ?? old('keyword') }}">
    </div>

    <span class="border mt-3"></span>

    <div class="p-3 mt-1">
      <label for="style" class="text-muted">募集スタイル</label>
      <select name="style" id="styleDesk" class="browser-default custom-select" value="" id="">
        <option value="" class="d-none">選択してください</option>
        <option value="1">漫才</option>
        <option value="2">コント</option>
        <option value="3">その他</option>
      </select>
    </div>

    <span class="border mt-3"></span>

    <div class="p-3 mt-1">
      <label for="position" class="text-muted">募集ポジション</label>
      <select name="position" id="positionDesk" class="browser-default custom-select p-2" value="" id="">
        <option value="" class="d-none">選択してください</option>
        <option value="1" >ボケ</option>
        <option value="2">ツッコミ</option>
        <option value="3">その他</option>
      </select>
    </div>

    <span class="border"></span>

    <div class="d-flex justify-content-center p-2">
      <button type="submit" class="btn winter-neva-gradient pink-text">検索</button>
    </div>
  </div>
</form>




