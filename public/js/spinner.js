define(["jquery"],function(n){n.fn.spinner=function(e){return e=n.extend({zIndex:100,timeout:1e4,$parent:null},e),this.each(function(){var i=n('<div class="load-spinner modal-body-spinner"></div>'),t=n(this),o=e.$parent?e.$parent:t;o.children("load-spinner").length?console.log("Loading is active"):o.append(i),i.css("z-index",e.zIndex).fadeIn(),setTimeout(function(){i.remove()},e.timeout),t.on("success spinner.stop",function(e){e.stopPropagation(),i.fadeOut(300,function(){n(this).remove()})})})}});