$(document).ready(function(){  

	
	
	
	
	
	
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