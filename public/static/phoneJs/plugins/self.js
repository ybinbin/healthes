// 自定义 js 文件，放置自己的函数
define(function () {
	function parseURL(url) {
	    var a =  document.createElement('a');
	    a.href = url;
	    return {
	        source: url,
	        protocol: a.protocol.replace(':',''),
	        host: a.hostname,
	        port: a.port||'80',
	        query: a.search,
	        params: (function(){
	            var ret = {},
	                seg = a.search.replace(/^\?/,'').split('&'),
	                len = seg.length, i = 0, s;
	            for (;i<len;i++) {
	                if (!seg[i]) { continue; }
	                s = seg[i].split('=');
	                ret[s[0]] = s[1];
	            }
	            return ret;
	        })(),
	        file: (a.pathname.match(/\/([^\/?#]+)$/i) || [,''])[1],
	        hash: a.hash.replace('#',''),
	        path: a.pathname.replace(/^([^\/])/,'/$1'),
	        relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [,''])[1],
	        segments: a.pathname.replace(/^\//,'').split('/')
	    };
	}
	
	return {
		parseURL: parseURL
	}
})