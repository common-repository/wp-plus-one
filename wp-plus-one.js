function addEvent(a,b,c){return a.addEventListener?(a.addEventListener(b,c,!1),!0):a.attachEvent?a.attachEvent("on"+b,c):!1}
var plusone=new function(){var a={},b=[],c,e,d=[];a.subscribe=function(a,c){b.push({name:a,callback:c});return[a,c]};a.unsubscribe=function(a){for(i=0;i<b.length;i++)b[i].name==a[0]&&b[i].callback==a[1]&&b.splice(i,1)};a.publish=function(a,c){if(b.length>0)for(i=0;i<b.length;i++)b[i].name==a&&b[i].callback(c)};a.ready=function(a){if(c)return a();e?d.push(a):(addEvent(window,"load",f),d=[a],e=setInterval(f,13))};var f=function(){if(c)return!1;if(document&&document.getElementsByTagName&&document.getElementById&&
document.body){clearInterval(e);e=null;for(var a=0;a<d.length;a++)d[a]();d=[];c=!0}};return a},wp_plus_one_redirects_source=[],wp_plus_one_redirects_destination=[];function wp_plus_one_handler(a){plusone.publish("click",a)}plusone.ready(function(){Array.prototype.indexOf=function(a){for(var b=this.length;b--;)if(this[b]===a)return b;return-1};plusone.subscribe("click",function(a){a=wp_plus_one_redirects_source.indexOf(a.href);if(a>-1)window.location=wp_plus_one_redirects_destination[a]})});