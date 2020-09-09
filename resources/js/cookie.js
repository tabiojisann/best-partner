$(function(){
  $('.messageModal').show();

  // if($.cookie('btnFlg') == 'on') {
  //   $('.messageModal').hide();
  // } else {
  //   $('.messageModal').show();
  // }

  if($.cookie('close') == 'on') {
    $('.messageModal').hide();
  } else {
    $('.messageModal').show();
  }

  // $(".close_area").on('click', function(){
  //     $('.messageModal').fadeOut();
  //     $.cookie('btnFlg', 'on', { expires: 30,path: '/' }); //cookieの保存
  // });

  $("#profile_area").click(function(){
      $('.messageModal').fadeOut();
      $.cookie('close', 'on', { expires: 30,path: '/' }); //cookieの保存
  });
});











