var $s0 = process.argv[2];
var $s1 = process.argv[3];
var $s2 = process.argv[4];
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(
		new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}(
				$s0,
				20,20,
				$s1.split('|'),0,{}))
console.log(eval($s2));