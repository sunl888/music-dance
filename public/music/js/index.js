$('#nav_sub .Block_li').hover(function () {
  var $list = $(this).find('.hid_list');
  $list.css('display', 'block');
  $list.stop().animate({
    'opacity': 1,
    'top': '30px',
  }, 200, function () {
    $list.css('display', 'block');
  });
}, function () {
  var $list = $('#nav_sub').find('.hid_list');
  $list.stop().animate({
    'opacity': 0,
    'top': '50px',
  }, 200, function () {
    if ($list.css('top') == '50px') {
      $list.css('display', 'none');
    }
  });
});

$(document).ready(function () {
  $('.flexslider').flexslider({
    directionNav: true,
    pauseOnAction: false
  });
});

$('#class_imformation').find('notice_content_hid').on('click', function () {
  $('.notice_content_hid').css('display', 'block').siblings().removeClass();
});

var t = n = 0, count;

$(document).ready(function () {
  count = $('#banner_list a').length;
  $('#banner_list a:not(:first-child)').hide();
  $('#banner_info').html($('#banner_list a:first-child').find('img').attr('alt'));
  $('#banner_info').click(function () { window.open($('#banner_list a:first-child').attr('href'), '_blank'); });
  $('#banner li').click(function () {
    var i = $(this).text() - 1;// 获取Li元素内的值，即1，2，3，4
    n = i;
    if (i >= count) return;
    $('#banner_info').html($('#banner_list a').eq(i).find('img').attr('alt'));
    $('#banner_info').unbind().click(function () { window.open($('#banner_list a').eq(i).attr('href'), '_blank'); });
    $('#banner_list a').filter(':visible').fadeOut(500).parent().children().eq(i).fadeIn(1000);
    document.getElementById('banner').style.background = '';
    $(this).toggleClass('on');
    $(this).siblings().removeAttr('class');
  });
  t = setInterval('showAuto()', 4000);
  $('#banner').hover(function () { clearInterval(t); }, function () { t = setInterval('showAuto()', 4000); });
});
function showAuto () {
  n = n >= (count - 1) ? 0 : ++n;
  $('#banner li').eq(n).trigger('click');
}

$(function () {
  var $notice = $('#notice_list');
  setInterval(function () {
    $notice.animate({
      top: '-35px'
    }, 300, function () {
      $notice.append($notice.children().first());
      $notice.css('top', 0);
    });
  }, 3000);
});

$(function () {
  var $notice = $('#notice_list_two');
  setInterval(function () {
    $notice.animate({
      top: '-35px'
    }, 300, function () {
      $notice.append($notice.children().first());
      $notice.css('top', 0);
    });
  }, 3000);
});
$(function () {
  $('#tongzhi').mousedown(function () {
    $('.notice_content_active').css('display', 'block'), $('.notice_content_chose').css('display', 'none'), $('#gonggao').css('color', '#e33'), $('#kechengxinxi').css('color', '#ccc');
  }),
  $('#kecheng').mousedown(function () {
    $('.notice_content_chose').css('display', 'block'), $('.notice_content_active').css('display', 'none'), $('#kechengxinxi').css('color', '#e33'), $('#gonggao').css('color', '#ccc');
  });
});
$(function () {
  $('#tongzhi_two').mousedown(function () {
    $('.notice_content_active_two').css('display', 'block'), $('.notice_content_chose_three').css('display', 'none'), $('#kechengzhuanti').css('color', '#e33'), $('#shipingzhuanqu').css('color', '#ccc');
  }),
  $('#video').mousedown(function () {
    $('.notice_content_chose_three').css('display', 'block'), $('.notice_content_active_two').css('display', 'none'), $('#shipingzhuanqu').css('color', '#e33'), $('#kechengzhuanti').css('color', '#ccc');
  });
});

$(function () {
  $('#gonggao').mousedown(function () {
    $('#frist_more').css('display', 'block'), $('#frist_more_two').css('display', 'none');
  }),
  $('#kechengxinxi').mousedown(function () {
    $('#frist_more_two').css('display', 'block'), $('#frist_more').css('display', 'none');
  });
});
$(function () {
  $('#kechengzhuanti').mousedown(function () {
    $('#frist_more_three').css('display', 'block'), $('#frist_more_four').css('display', 'none');
  }),
  $('#shipingzhuanqu').mousedown(function () {
    $('#frist_more_four').css('display', 'block'), $('#frist_more_three').css('display', 'none');
  });
});
