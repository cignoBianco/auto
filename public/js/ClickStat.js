define("ClickStat",["jquery"],function(e){var o={};return o.request=function(o,d){var t=void 0!==window.clickStatOrder?window.clickStatOrder:{},n=e.extend(t,d,{type:o});e.ajax({type:"POST",url:"/_backend/_stat/shop/click",xhrFields:{withCredentials:!0},data:n})},o.showContact=function(e,d,t){switch(e){case"phone":o.showPhone(d,t);break;case"email":o.showEmail(d,t)}},o.viewShopCard=function(d,t){o.request("view_shop_card",e.extend({shopId:d},void 0===t?{}:t))},o.showPhone=function(d,t){o.request("show_phone",e.extend({shopId:d},void 0===t?{}:t))},o.showEmail=function(d,t){o.request("show_email",e.extend({shopId:d},void 0===t?{}:t))},o.showMap=function(d,t){o.request("show_map",e.extend({shopId:d},void 0===t?{}:t))},o.openWww=function(d,t){o.request("open_www",e.extend({shopId:d},void 0===t?{}:t))},o.addToCart=function(d,t){o.request("add_cart",e.extend({shopId:d},void 0===t?{}:t))},o.sendQuickOrder=function(d,t){o.request("send_order_quick",e.extend({shopId:d},void 0===t?{}:t))},o.clickOrder=function(d,t){o.request("click_order",e.extend({shopId:d},void 0===t?{}:t))},o.sendOrderFromCart=function(e){o.request("send_order_cart",{shopId:e})},o});