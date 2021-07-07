// 自定义 js 文件，放置自己的函数
define(function () {
	// 下标循环函数-以数学坐标轴的x轴坐标点为准
	// 参数1：开始范围
	// 参数2：结束范围
	// 参数3：在开始和结束范围内循环的下标
	function loop(d,a,c){c>0?c++:0;var b=c%(a-d+1);return c>0?b==0?a:d+b-1:b==0?d:a+b+1};


	return {
		loop: loop
	}
})