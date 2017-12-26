//↓送至效果
$("#city").click(function (e) {
	SelCity(this,e);
    console.log("inout",$(this).val(),new Date())
});

//↓头部导航条右边效果
$(".top_bar .ufr .menu").mouseover(function() {
	$(this).css({
		"background": "white"
	});
	$(this).children().eq(0).children().eq(0).hide();
	$(this).children().eq(0).children().eq(2).css({"transform":"rotate(180deg)"});
	$(this).children().eq(1).show();
	$(this).children().eq(1).children().eq(0).show();
})
$(".top_bar .ufr .menu").mouseout(function() {
	$(this).css({
		"background": ""
	});
	$(this).children().eq(0).children().eq(0).show();
	$(this).children().eq(0).children().eq(2).css({"transform":""});
	$(this).children().eq(1).hide();
	$(this).children().eq(1).children().eq(0).show();
})

$(".top_bar .ufr .koudai").mouseover(function() {
	$(this).css({
		"background": "white"
	});
	$(this).children().eq(0).children().eq(0).hide();
	$(this).children().eq(0).children().eq(3).css({"transform":"rotate(180deg)"});
	$(this).children().eq(1).show();
})
$(".top_bar .ufr .koudai").mouseout(function() {
	$(this).css({
		"background": ""
	});
	$(this).children().eq(0).children().eq(0).show();
	$(this).children().eq(0).children().eq(3).css({"transform":""});
	$(this).children().eq(1).hide();
})

$(".s_cart").mouseover(function() {
	$(".s_box").css({
		"border-bottom": "none"
	})
	$(".s_content").show();
	$(".s_content").css({
		"box-shadow": "0 0 5px #bbb"
	});
})
$(".s_cart").mouseout(function() {
	$(".s_box").css({
		"border-bottom": ""
	})
	$(".s_content").hide();
	$(".s_content").css({
		"box-shadow": ""
	});
})

//↓商品分类效果
$(".adverContainer .categorys .item").mouseover(function() {
	$(this).addClass("active");
	$(this).children().eq(1).show();
})
$(".adverContainer .categorys .item").mouseout(function() {
	$(this).removeClass("active");
	$(this).children().eq(1).hide();
})

//↓大轮播图效果
var mySwiper = new Swiper('.swiper-container', {
	direction: 'horizontal',
	loop: true,
	autoplay: 5000,
	autoplayDisableOnInteraction: false,
	speed: 600,
	// 如果需要分页器
	pagination: '.swiper-pagination',

	// 如果需要前进后退按钮
	nextButton: '.swiper-button-next',
	prevButton: '.swiper-button-prev',
	pagination: '.swiper-pagination',
	paginationClickable: true,
	paginationBulletRender: function(swiper, index, className) {
		return '<span class="' + className + '">' + (index + 1) + '</span>';
	}
})

//↓小轮播图
$(function() {
	$('.right_arrow').click(function() {
		$(".smallSwiper ul").animate({
			marginLeft: "-253px"
		}, 800, function() {
			$(".smallSwiper ul>li").eq(0).appendTo($(".smallSwiper ul"));
			$(".smallSwiper ul").css('marginLeft', '0px');
		});
	})
	$('.left_arrow').click(function() {
		$(".smallSwiper ul").css('marginLeft', '-253px');
		$(".smallSwiper ul>li").eq(5).prependTo($(".smallSwiper  ul"));
		$(".smallSwiper ul").animate({
			marginLeft: "0px"
		}, 800);
	})
})

//
var num = 0;
var move;
function scroll() {
	num++;
	if(num % 400 == 0) {
		$(".smallSwiper ul").animate({
			"margin-left": "-253px"
		}, function() {
			$(".smallSwiper ul li").eq(0).appendTo($(".smallSwiper ul"))
			$(".smallSwiper ul").css({
				"margin-left": 0
			})
		})
	}
	move = window.requestAnimationFrame(scroll);
}
scroll();
$(".smallSwiper ul").mouseover(function() {
	window.cancelAnimationFrame(move);
})
$(".smallSwiper ul").mouseout(function() {
	window.requestAnimationFrame(scroll);
})

//↓换一组效果
$(".hot_goods .mt a").mouseover(function() {
	$(this).children().eq(0).css({
		"transform": "rotate(180deg)"
	});
})
$(".hot_goods .mt a").mouseout(function() {
	$(this).children().eq(0).css({
		"transform": ""
	});
})


//↓热销好货下的四张图片效果
$(".entrance li").mouseover(function() {
	$(this).children().children().addClass("active");
})
$(".entrance li").mouseout(function() {
	$(this).children().children().removeClass("active");
})

//↓楼层上方商品分类效果
//$(".ul_class li").eq(0).addClass("cc");
$(function() {
	$("body").on('mouseover',".floor .ul_class li",function(){
	  $(this).addClass('cc').siblings().removeClass('cc');
	  now = $(this).index();
	  $(this).parent(".ul_class").parent(".mt").siblings(".mc").find(".cs").css({
	  	"left": -now * 816 + "px"
	  })
	});
})

//↓左侧导航条效果
$(".left_nav a").click(function() {
	$("html, body").animate({
		scrollTop: $($(this).attr("href")).offset().top + "px"
	}, 600);
	return false; //不要这句会有点卡顿
});
window.onscroll = function() {
	var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;

	if(scrollTop >= 1328) {
		$(".left_nav").fadeIn(150);
	} else {
		$(".left_nav").fadeOut(150);
	}
	//		console.log(scrollTop);
	for(var i = 0; i < 9; i++) {
		if(scrollTop >= 1325 + i * 630 && scrollTop <= 1325 + (i + 1) * 630) {
			$(".left_nav i").eq(i).hide();
			$(".left_nav span").eq(i).show();
		} else {
			$(".left_nav i").eq(i).show();
			$(".left_nav span").eq(i).hide();
		}
	}
}

//↓右侧导航条效果
$(".right_nav .mc").mouseover(function() {
	$(this).addClass("current");
})
$(".right_nav .mc").mouseout(function() {
	$(this).removeClass("current");
})
// toggleClass：如果不存在就添加cart_show类名；如果存在就删除cart_show类名
$(".right_nav #cart_show").click(function() {
	$(".side_cart").toggleClass("cart_show");
})
$(".side_cart .mt a").click(function() {
	$(".side_cart").removeClass("cart_show");
})
//返回顶部
$(".right_nav .nav_bottom #totop").click(function() {
	$("html, body").animate({
		scrollTop: 0
	}, 600);
})