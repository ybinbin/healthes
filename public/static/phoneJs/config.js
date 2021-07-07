require.config({
	baseUrl: "/static/phoneJs",
	paths: {
		jquery: "plugins/jquery.min",
		underscore: "plugins/underscore-min",
		self: "plugins/self"
	}
})

// 全局补丁，新闻列表页，对内容的长度限制，防止内容过长出现在查看详情按钮下方
require(['jquery'], function ($) {
	$(function () {
		$('.news-list p span').each(function () {
			let lineNum = 43,
				txt = $(this).text().trim(),
				yu = txt.length % lineNum
			;
			if (yu > 7) {
				txt = txt.slice(0, txt.length - (yu - 13));
			}
			$(this).text(txt + '...');
		})
	})
})