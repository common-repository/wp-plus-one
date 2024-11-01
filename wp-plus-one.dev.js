function addEvent(obj, evType, fn){ 
	if (obj.addEventListener){ 
		obj.addEventListener(evType, fn, false); 
		return true; 
	} else if (obj.attachEvent){ 
		return obj.attachEvent("on"+evType, fn); 
	} else { 
		return false; 
	} 
}

var plusone = new function() {
	var my = {};
	var subs = [];
	
	var done;
	var timer;
	var load_events = [];
	
	my.subscribe = function(name, callback){
		subs.push({
			'name': name, 
			'callback': callback
		});
		return [name,callback];
	};
	my.unsubscribe = function(args){
		for(i = 0; i < subs.length; i++){
			if(subs[i].name == args[0] && subs[i].callback == args[1])
				subs.splice(i, 1);
		}
	};
	my.publish = function(name, args){
		var temp = [];
		if(subs.length > 0){
			for(i = 0; i < subs.length; i++) {
				if(subs[i].name == name)
					subs[i].callback(args);
			}
		}
	};
	my.ready = function(func) {
		if (done) return func();

		if(timer) {
			load_events.push(func);
		} else {
			addEvent( window, "load", isDOMReady );
			load_events = [ func ];
			timer = setInterval(isDOMReady, 13);
		}
	};
	var isDOMReady = function() {
		if (done) return false;

		if( document && document.getElementsByTagName && document.getElementById && document.body ) {
			clearInterval( timer );
			timer = null;
			for( var i = 0; i < load_events.length; i++ ) {
				load_events[i]();
			}
			load_events = [];
			done = true;
		}
	}
	
	return my;
}();

var wp_plus_one_redirects_source = new Array();
var wp_plus_one_redirects_destination = new Array();

function wp_plus_one_handler(params) { 
	plusone.publish('click', params);
}

plusone.ready(function() {
	Array.prototype.indexOf = function(obj) {
	  var i = this.length;
	  while (i--) {
		if (this[i] === obj) {
		  return i;
		}
	  }
	  return -1;
	}

	plusone.subscribe('click', function(params) {
		var idx = wp_plus_one_redirects_source.indexOf(params.href);
		if (idx > -1)
			window.location = wp_plus_one_redirects_destination[idx];
	} );
});s