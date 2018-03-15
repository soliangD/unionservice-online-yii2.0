$(document).ready(function(){  

	
	//将当前页面的导航栏对应的<a>加上hover  ,不在js中改变样式，变化时会抖动，放入php中
    // $(".navbar-nav a").each(function(){  
        // $this = $(this); 
		// var href = getUrlParam($(this)[0].href,'r'); 
		// var url = getUrlParam(String(window.location),'r');
		// if( href == url ){  
			// $this.addClass("hover"); 		
		// }   
    // });  
	
	
	$('.dropdown').hover( //鼠标滑过导航栏目时 
		function(){ 
		$('.dropdown ul').show(); //显示下拉列表 
		$('.dropdown > a').css({'color':'#f29636','background':'#363636'}); //设置导航栏目样式，醒目 
		}, 
		function(){ 
		$('.dropdown ul').hide();    //鼠标移开后隐藏下拉列表 
		$('.dropdown > a').css({'color':'','background':''}); 
		} 
	); 
		

	
	//轮播图部分
	var t = n =0, count;   //n为当前点击对象，
	
	count=$("#banner #item").length;
	
	$("#banner #item").eq(0).fadeIn(500);    //将默认全部隐藏的图片显示第一张
	
	for(i=0;i<count;i++){
			$("#picNum").append("<li id="+(i+1)+"></li>");  //picnum  下面的切换键
		}
	
	$("#picNum li").eq(0).addClass("cur");     //给第一个添加类
			
	$("#banner li").click(function() {   //按钮点击事件

		var i = $(this).attr('id') -1;  //获取Li元素内的值，即1，2，3，4

		n = i;

		if (i >= count) return;

		$("#banner #item").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);

		$(this).toggleClass("cur");

		$(this).siblings().removeAttr("class");    //siblings获得所有同代元素，removeAttr("class")移除所有class属性

	});


	t = setInterval("showAuto()", 4000);

	$("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});

	showAuto=function()
	{
		n = n >=(count -1) ?0 : ++n;

		$("#banner li").eq(n).trigger('click');
	}
	//轮播图部分结束
	
	
	
	//业务展示图标滑动
	currentP = 
	$(".icon-menu .icon").hover(function(){
			$('.icon').css("background-position","0px "+currentP+"px");
		},
		function(){
			
		}
	);
	
	
	
	//业务展示图标滑动结束
	
	//foot link 
	
	$(".foot-link").click(function(){
		$(".foot-link ul").slideDown("slow");
	});
	$(".foot-link").mouseleave(function(){
		$(".foot-link ul").slideUp("slow");
	});
	
	
	
	
}); 



/**
 * @param {string} url, 需要解析的url，必传
 * @param {string} name, 需要获取的参数名，必传
 * @returns
 */
function getUrlParam(url, name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象

	if(url.split('?')[1] != null){
		var r = url.split('?')[1].substr(0).match(reg); //匹配目标参数
	}
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}