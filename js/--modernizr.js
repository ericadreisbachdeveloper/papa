/*! modernizr 3.3.1 (Custom Build) | MIT *
 * http://modernizr.com/download/?-prefixedcss-prefixedcssvalue-setclasses-teststyles !*/
!function(e,n,t){function r(e,n){return typeof e===n}function o(){var e,n,t,o,i,s,a;for(var f in g)if(g.hasOwnProperty(f)){if(e=[],n=g[f],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=r(n.fn,"function")?n.fn():n.fn,i=0;i<e.length;i++)s=e[i],a=s.split("."),1===a.length?Modernizr[a[0]]=o:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=o),y.push((o?"":"no-")+a.join("-"))}}function i(e){var n=S.className,t=Modernizr._config.classPrefix||"";if(x&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),x?S.className.baseVal=n:S.className=n)}function s(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function a(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):x?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function f(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function l(e,n){return!!~(""+e).indexOf(n)}function u(e,n){return function(){return e.apply(n,arguments)}}function p(e,n,t){var o;for(var i in e)if(e[i]in n)return t===!1?e[i]:(o=n[e[i]],r(o,"function")?u(o,t||n):o);return!1}function d(){var e=n.body;return e||(e=a(x?"svg":"body"),e.fake=!0),e}function c(e,t,r,o){var i,s,f,l,u="modernizr",p=a("div"),c=d();if(parseInt(r,10))for(;r--;)f=a("div"),f.id=o?o[r]:u+(r+1),p.appendChild(f);return i=a("style"),i.type="text/css",i.id="s"+u,(c.fake?c:p).appendChild(i),c.appendChild(p),i.styleSheet?i.styleSheet.cssText=e:i.appendChild(n.createTextNode(e)),p.id=u,c.fake&&(c.style.background="",c.style.overflow="hidden",l=S.style.overflow,S.style.overflow="hidden",S.appendChild(c)),s=t(p,e),c.fake?(c.parentNode.removeChild(c),S.style.overflow=l,S.offsetHeight):p.parentNode.removeChild(p),!!s}function m(n,r){var o=n.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(s(n[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var i=[];o--;)i.push("("+s(n[o])+":"+r+")");return i=i.join(" or "),c("@supports ("+i+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return t}function v(e,n,o,i){function s(){p&&(delete P.style,delete P.modElem)}if(i=r(i,"undefined")?!1:i,!r(o,"undefined")){var u=m(e,o);if(!r(u,"undefined"))return u}for(var p,d,c,v,h,y=["modernizr","tspan"];!P.style;)p=!0,P.modElem=a(y.shift()),P.style=P.modElem.style;for(c=e.length,d=0;c>d;d++)if(v=e[d],h=P.style[v],l(v,"-")&&(v=f(v)),P.style[v]!==t){if(i||r(o,"undefined"))return s(),"pfx"==n?v:!0;try{P.style[v]=o}catch(g){}if(P.style[v]!=h)return s(),"pfx"==n?v:!0}return s(),!1}function h(e,n,t,o,i){var s=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+E.join(s+" ")+s).split(" ");return r(n,"string")||r(n,"undefined")?v(a,n,o,i):(a=(e+" "+w.join(s+" ")+s).split(" "),p(a,n,t))}var y=[],g=[],C={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){g.push({name:e,fn:n,options:t})},addAsyncTest:function(e){g.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=C,Modernizr=new Modernizr;var S=n.documentElement,x="svg"===S.nodeName.toLowerCase(),_="Moz O ms Webkit",w=C._config.usePrefixes?_.toLowerCase().split(" "):[];C._domPrefixes=w;var b=function(e,n){var t=!1,r=a("div"),o=r.style;if(e in o){var i=w.length;for(o[e]=n,t=o[e];i--&&!t;)o[e]="-"+w[i]+"-"+n,t=o[e]}return""===t&&(t=!1),t};C.prefixedCSSValue=b;var E=C._config.usePrefixes?_.split(" "):[];C._cssomPrefixes=E;var z=function(n){var r,o=prefixes.length,i=e.CSSRule;if("undefined"==typeof i)return t;if(!n)return!1;if(n=n.replace(/^@/,""),r=n.replace(/-/g,"_").toUpperCase()+"_RULE",r in i)return"@"+n;for(var s=0;o>s;s++){var a=prefixes[s],f=a.toUpperCase()+"_"+r;if(f in i)return"@-"+a.toLowerCase()+"-"+n}return!1};C.atRule=z;var N={elem:a("modernizr")};Modernizr._q.push(function(){delete N.elem});var P={style:N.elem.style};Modernizr._q.unshift(function(){delete P.style});C.testStyles=c;C.testAllProps=h;var j=C.prefixed=function(e,n,t){return 0===e.indexOf("@")?z(e):(-1!=e.indexOf("-")&&(e=f(e)),n?h(e,n,t):h(e,"pfx"))};C.prefixedCSS=function(e){var n=j(e);return n&&s(n)};o(),i(y),delete C.addTest,delete C.addAsyncTest;for(var L=0;L<Modernizr._q.length;L++)Modernizr._q[L]();e.Modernizr=Modernizr}(window,document);