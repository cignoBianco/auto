define(["jquery"],function(o){o.fn.onPositionChanged=function(t,i){null==i&&(i=100);var n=o(this[0]);if(n.length<1)return n;var e=null,r=null;return setInterval(function(){if(null==n||n.length<1)return n;null==e&&(e=n.position()),null==r&&(r=n.offset());var i=n.position(),l=n.offset();e.top===i.top&&e.left===i.left||(o(this).trigger("onPositionChanged",{lastPos:e,newPos:i}),"function"==typeof t&&t(e,i),e=n.position()),r.top===l.top&&r.left===l.left||(o(this).trigger("onOffsetChanged",{lastOff:r,newOff:l}),"function"==typeof t&&t(r,l),r=n.offset())},i),n};var t=[],i=[];return this.customizePerfectScrollbar=function(n){for(var e in t)t[e].disconnect();t=[],i=[];var r=o("body")[0];if(void 0===n||void 0===n.showStartScroll||void 0===n.minScrollSize)i.showStartScroll=!0,i.minScrollSize=50;else{if(!1===n.showStartScroll)return;i=n}i.minTopPosition=void 0===n.minTopPosition?4:n.minTopPosition,i.maxTopPosition=void 0===n.maxTopPosition?90:n.maxTopPosition,void 0!==i.maxScrollableArea&&i.maxScrollableArea;var l=function(){var t=o(".ps-container .ps-scrollbar-y-rail .ps-scrollbar-y");o.each(t,function(t,n){var e=function(){o(n).css("height",i.minScrollSize)};e(),setTimeout(e,300)})};setTimeout(l,300);var s=new MutationObserver(function(o){o.forEach(function(o){l()})});s.observe(r,{attributes:!0,childList:!0,characterData:!0}),t.push(s)},this});