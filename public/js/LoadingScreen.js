define(["jquery","plugin.spinner"],function(n){return{show:function(){n("body").spinner(),setTimeout(function(){n("body").trigger("spinner.stop")},1e4)},hide:function(){n("body").trigger("spinner.stop")}}});