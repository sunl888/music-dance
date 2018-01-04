$('#nav_sub .Block_li').hover(function () {
        var $list = $(this).find('.hid_list')
        $list.css('display', 'block');
        $list.stop().animate({ 
            'opacity': 1,
            'top': '28px',
        }, 200, function(){
            $list.css('display', 'block');
        }); 
    }, function () {
        var $list = $('#nav_sub').find('.hid_list')
        $list.stop().animate({
            'opacity': 0,
            'top': '50px',
        }, 200, function () {
            if($list.css('top') == '50px'){
                $list.css('display', 'none');
            }
        })
    })


$(document).ready(function(){
        $('.flexslider').flexslider({
            directionNav: true,
            pauseOnAction: false
        });
    });

    $('#class_imformation').find('notice_content_hid').on('click',function(){
            $('.notice_content_hid').css('display','block').siblings().removeClass();
    });



var t = n =0, count;

$(document).ready(function(){ 
count=$("#banner_list a").length;
$("#banner_list a:not(:first-child)").hide();
$("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt'));
$("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr('href'), "_blank")});
$("#banner li").click(function() {
var i = $(this).text() -1;//获取Li元素内的值，即1，2，3，4
n = i;
if (i >= count) return;
$("#banner_info").html($("#banner_list a").eq(i).find("img").attr('alt'));
$("#banner_info").unbind().click(function(){window.open($("#banner_list a").eq(i).attr('href'), "_blank")})
$("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
document.getElementById("banner").style.background="";
$(this).toggleClass("on");
$(this).siblings().removeAttr("class");
});
t = setInterval("showAuto()", 4000);
$("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
})
function showAuto()
{
n = n >=(count -1) ?0 : ++n;
$("#banner li").eq(n).trigger('click');
}

$(function () {
          var $notice = $('#notice_list');
          setInterval(function () { 
              $notice.animate({
                  top: '-35px'
              }, 300,function () {
                  $notice.append($notice.children().first());
                  $notice.css('top', 0);
              })
          }, 3000) 
      })