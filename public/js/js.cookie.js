!function(e){var n;if("function"==typeof define&&define.amd)define(["jquery"],e);else if("object"==typeof exports){try{n=require("jquery")}catch(e){}module.exports=e(n)}else{var o=window.Cookies,r=window.Cookies=e(window.jQuery);r.noConflict=function(){return window.Cookies=o,r}}}(function(e){function n(e){return u.raw?e:encodeURIComponent(e)}function o(e){return u.raw?e:decodeURIComponent(e)}function r(e,n){var o=u.raw?e:function(e){0===e.indexOf('"')&&(e=e.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return e=decodeURIComponent(e.replace(c," ")),u.json?JSON.parse(e):e}catch(e){}}(e);return i(n)?n(o):o}function t(){for(var e,n,o=0,r={};o<arguments.length;o++){n=arguments[o];for(e in n)r[e]=n[e]}return r}function i(e){return"[object Function]"===Object.prototype.toString.call(e)}var c=/\+/g,u=function(e,c,f){if(arguments.length>1&&!i(c)){if("number"==typeof(f=t(u.defaults,f)).expires){var s=f.expires,a=f.expires=new Date;a.setMilliseconds(a.getMilliseconds()+864e5*s)}return document.cookie=[n(e),"=",function(e){return n(u.json?JSON.stringify(e):String(e))}(c),f.expires?"; expires="+f.expires.toUTCString():"",f.path?"; path="+f.path:"",f.domain?"; domain="+f.domain:"",f.secure?"; secure":""].join("")}for(var d=e?void 0:{},p=document.cookie?document.cookie.split("; "):[],l=0,m=p.length;l<m;l++){var v=p[l].split("="),g=o(v.shift()),w=v.join("=");if(e===g){d=r(w,c);break}e||void 0===(w=r(w))||(d[g]=w)}return d};return u.get=u.set=u,u.defaults={},u.remove=function(e,n){return u(e,"",t(n,{expires:-1})),!u(e)},e&&(e.cookie=u,e.removeCookie=u.remove),u});