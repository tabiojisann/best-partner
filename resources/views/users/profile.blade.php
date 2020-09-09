<table class="table">

  <thead>

    @if(!empty($user->birthday))
    <tr>
    <th style="width:30%" >生年月日</th>
    <th >{{  $user->birthday->format('Y年 n月 j日') }}</th>
    </tr>
    @endif

    @if(!empty($user->sex))
    <tr>
    <th style="width:30%" >性別</th>
    <th >{{ $user->sex }}</th>
    </tr>
    @endif

    @if(!empty($user->birthplace))
    <tr>
    <th style="width:30%" >出身地</th>
    <th >{{ $user->birthplace }}</th>
    </tr>
    @endif


    @if(!empty($user->height))
    <tr>
    <th style="width:30%" >身長</th>
    <th>
    <?php 
    echo  $user->height . ' ' . 'cm';
    ?>
    </th>
    </tr>
    @endif

    @if(!empty($user->weight)) 
    <tr>
    <th style="width:30%" >体重</th>
    <th>
    <?php 
    echo  $user->weight . ' ' . 'kg';
    ?>
    </th>
    </tr>
    @endif

    @if(!empty($user->hobby))
    <tr>
    <th style="width:30%" >趣味</th>
    <th >{{ $user->hobby }}</th>
    </tr>
    @endif


    @if(!empty($user->skill))
    <tr>
    <th style="width:30%" >特技、資格</th>
    <th >{{ $user->skill }}</th>
    </tr>
    @endif

    @if(!empty($user->background))
    <tr>
    <th style="width:30%" >学歴</th>
    <th >{{ $user->background }}</th>
    </tr>
    @endif

    @if(!empty($user->influence))
    <tr>
    <th style="width:35%" >影響を受けた人物</th>
    <th >{{ $user->influence }}</th>
    </tr>
    @endif

  </thead>
</table>