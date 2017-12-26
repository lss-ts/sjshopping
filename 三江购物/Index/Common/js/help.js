$(document).ready(function(){
	// 显示第一个
	$('.help-detail-b').css({'display':'none'});
	$('.help-detail-b').eq(0).css({'display':'block'});
	// 点击显示相应的
	$('.help-list a').click(function(){
		$('.help-list a').removeClass();
		$(this).addClass('active');

		// console.log($(this).index());
		$('.help-detail-b').css({'display':'none'});
		$('.help-detail-b').eq($(this).index()).css({'display':'block'});
	})
	// 头部导航栏和坐标导航栏位置
	// 初始化设置防止bug
	if($(document).scrollTop()>109){
			$('.help-nav-bar').css({'position': 'fixed','top':0,'left':0,'z-index':20});
			$('.helplist-nav').css({'position': 'fixed','top':60,'left':'50%','z-index':20,'marginLeft':function(){
				return parseInt($('body').css('width')) > 1000 ? -500 : 0;
			}});
		}else{
			$('.help-nav-bar').css({'position': 'relative'});
			$('.helplist-nav').css({'position': 'relative','top':0,'left':0,'z-index':20,'marginLeft':0});
		}
	// 头部导航栏和坐标导航栏位置    两个位置变为 fixed
	$(window).scroll( function() { 

		if($(document).scrollTop()>109){
			$('.help-nav-bar').css({'position': 'fixed','top':0,'left':0,'z-index':20});
			$('.helplist-nav').css({'position': 'fixed','top':60,'left':'50%','z-index':20,'marginLeft':function(){
				console.log($('body').css('width'));
				return parseInt($('body').css('width')) > 1000 ? -500 : 0;
			}});
		}else{
			$('.help-nav-bar').css({'position': 'relative'});
			$('.helplist-nav').css({'position': 'relative','top':0,'left':0,'z-index':20,'marginLeft':0});
		}
		
	 } );
	// 查找商店
	$('.search-shop').click(function(){
		$('.search-shop i').css({'background-position': '0 -38px'});
		$('.search-shop ul').css({'display':function(index,value){
			// console.log(index,value);
			return value=='block' ? 'none':'block';
		}});

	})
	$('.search-shop').mouseout(function(){
		$('.search-shop i').css({'background-position': '0 -23px'});
		
		$('.search-shop ul').css({'display':'none'});
	})
	$('.search-shop ul').mouseover(function(){
		// console.log(11111);
		$(this).css({'display':'block'});
	})
	$('.search-shop ul li').click(function(){
		// console.log($(this).html())
		// console.log($(this).index());
		$('.search-shop span').html($(this).html());
		$('.search-shop ul').css({'display':'none'});
		if($(this).index()!=0){
			$('.shops').css({'display':'none'});
			$('.shops').eq($(this).index()-1).css({'display':'block'});
		}else{
			$('.shops').css({'display':'block'});
		}
		
	})
})