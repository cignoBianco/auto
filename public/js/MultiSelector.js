define(["jquery"],function(e){function t(t){var l=[],a=e(t).find(".select-list"),s=e(t).find("select"),n=e(t).find(".multiselect-trigger-button");e(a).find("div.__checkbox.selected").each(function(){e(this).closest("li").hasClass("select-all")||(l[l.length]=e(this).parent().data("id"))}),e(t).data("deletable")&&n.addClass("del"),e(s).val(l).trigger("change"),i(t,l)}function l(t){var l=e(t).find(".select-list"),a=e(t).find("select"),s=e(t).find(".multiselect-trigger-button");l.find("div.__checkbox:not(.select-all-checkbox)").removeClass("selected"),e(a).find("option:selected").each(function(){l.find('label[data-id="'+e(this).val()+'"] div.__checkbox').addClass("selected"),e(t).data("deletable")&&e(this).val()&&s.addClass("del")}),i(t,e(a).val())}function i(t,l){var i=e(t).find(".search-field"),a=e(t).find("select");if(e(t).data("alwaysPlaceholder")?l&&(0===l.length?e(i).prop("placeholder",e(t).data("placeholder")):e(i).prop("placeholder",e(t).data("placeholder")+" ("+l.length+")")):e(t).data("withoutPlaceholder")?(e(i).prop("placeholder",e(a).find("option:selected").html()),e(i).addClass("selected")):e(t).hasClass("single-select")?(e(i).prop("placeholder",e(a).find("option:selected").html()||e(t).data("placeholder")),e(a).find("option:selected").val()&&e(i).addClass("selected")):l&&(0===l.length?(e(i).prop("placeholder",e(t).data("placeholder")),e(i).removeClass("selected")):1===l.length?(e(i).prop("placeholder",e(a).find("option:selected").html()),e(i).addClass("selected")):(e(i).prop("placeholder",l.length+" выбрано"),e(i).addClass("selected"))),e(t).data("showSelectedElements")){var s=[];e(a).find("option:selected").each(function(){s[s.length]=e(this).html()}),s.length>0?(e(t).find(".selected-elements-body").empty().html(s.join(e(t).data("selectedElementsSeparator"))),e(t).find(".selected-elements").show()):e(t).find(".selected-elements").hide()}}function a(e){var t={q:"й",w:"ц",e:"у",r:"к",t:"е",y:"н",u:"г",i:"ш",o:"щ",p:"з","[":"х","]":"ъ",a:"ф",s:"ы",d:"в",f:"а",g:"п",h:"р",j:"о",k:"л",l:"д",";":"ж","'":"э",z:"я",x:"ч",c:"с",v:"м",b:"и",n:"т",m:"ь",",":"б",".":"ю","й":"q","ц":"w","у":"e","к":"r","е":"t","н":"y","г":"u","ш":"i","щ":"o","з":"p","х":"\\[","ъ":"\\]","ф":"a","ы":"s","в":"d","а":"f","п":"g","р":"h","о":"j","л":"k","д":"l","ж":";","э":"'","я":"z","ч":"x","с":"c","м":"v","и":"b","т":"n","ь":"m","б":",","ю":"."};e=e.toLowerCase();for(var l="",i=0;i<e.length;i++)t[e[i]]?l+=t[e[i]]:l+=e[i];return l}function s(t,l){!function(t){var l=e(t).find(".multiselect-hint");"left"===e(t).data("hintPosition")?l.css("right",t.width()):l.css("left",t.width())}(t);var i=t.find(".current-option").find(".element-label"),a=t.find(".search-field"),s=i.parent().find(".__checkbox:visible").width()||0;if(i.length&&(i.data("hint")||i.width()>i.parent().width()-s&&a.is(":focus"))){var o=e(t).find(".multiselect-hint");if(e(t).data("hintBlock")){o=e(e(t).data("hintBlock"));var d=l.offset().top-5,c=e(t).offset().left+e(t).width();o.offset({top:d,left:c}),o.css({width:"150px",padding:"10px 8px"})}o.html(i.data("hint")||i.text()),o.show(),o.offset({top:e(i).parent().offset().top})}else n(t)}function n(t){var l=e(t).find(".multiselect-hint");e(t).data("hintBlock")&&(l=e(e(t).data("hintBlock"))).offset({top:0,left:0}),l.html(""),l.hide()}function o(t,a,s){var n=e(t).data("ajaxSettings"),o=e(t).data("allowFreeInput"),d=e(t).find("select"),c=(t.find(".search-field"),d.val()),h=e(t).find(".select-list"),r={};n.ajaxControllerParams&&(r=n.ajaxControllerParams);var p=Routing.generate(n.ajaxController,r),f={};if(n.loadBySearch){var u=n.startLoadChar||3;if(e(t).find(".search-field").val().trim().length<u&&a)return!1;f.searchString=e(t).find(".search-field").val().trim()}n.influentialFields&&e.each(n.influentialFields,function(){f[this]=a&&!n.affectFieldsForStringSearch?"":e("#"+this).is(":checkbox")?e("#"+this).prop("checked")?"1":"":e("#"+this).val()}),e.post({url:p,dataType:"json",data:f,success:function(n){o&&0===n.data.length||(d.empty(),e.each(n.data,function(t,l){var i=e('<option value="'+l.id+'">'+l.name+"</option>");d.append(i)}),d.resetSelectList(),1!==d.children().length||s||o?0!==e(h).find("ul").children().length?(d.val(c),a&&(e(h).slideDown(100),e(h).perfectScrollbar("update")),e(h).find(".not-found-msg").hide()):e(h).find(".not-found-msg").show():(d.children().prop("selected",!0),c!==d.val()&&(d.trigger("change"),i(t,d.val())),e(h).find(".not-found-msg").hide()),l(t))}})}e.fn.multiSelect=function(d){var c;if(!e(this).length)return this;if(e(this).length>1&&e(this).each(function(){e(this).multiSelect(d)}),e(this).hasClass("rendered"))return!1;e(this).addClass("rendered");var h=e(this).closest(".dropdown-select-search"),r=e(h).find(".select-list"),p=e(h).find(".search-field"),f=e(h).find("select");if(e(h).data("showSelectedElements",d.showSelectedElements),e(h).data("selectedElementsSeparator",d.selectedElementsSeparator||", "),e(h).data("placeholder",d.placeholder||e(this).attr("placeholder")||"Выберите"),e(h).data("multiple",e(this).prop("multiple")),e(h).data("alwaysPlaceholder",d.alwaysPlaceholder),e(h).data("withoutPlaceholder",d.withoutPlaceholder),e(h).data("withoutSearch",d.withoutSearch),e(h).data("deletable",d.deletable),e(h).data("checkBoxClass",d.checkBoxClass),e(h).data("selectAllCheckbox",d.selectAllCheckbox),e(h).data("ajaxSettings",d.ajaxSettings),e(h).data("searchString",""),e(h).data("autocomplete",d.autocomplete||"off"),e(h).data("notFoundMsg",d.notFoundMsg||"Ничего не найдено"),e(h).data("hintPosition",d.hintPosition||"right"),e(h).data("preHint",d.preHint),e(h).data("allowFreeInput",d.allowFreeInput),e(h).data("logosFolder",d.logosFolder),e(h).data("hintBlock",d.hintBlock),r.perfectScrollbar({minScrollbarLength:20}),r.prepend(e('<div class="not-found-msg" style="display: none;">'+e(h).data("notFoundMsg")+"</div>")),e(h).data("preHint")&&r.prepend(e('<div class="pre-hint">'+e(h).data("preHint")+"</div>")),d.ajaxSettings&&d.ajaxSettings.influentialFields&&d.ajaxSettings.influentialFieldsChange&&e.each(d.ajaxSettings.influentialFields,function(){e("#"+this).on("change",function(){o(h,!1,!0)})}),e(h).data("alwaysPlaceholder")&&(e(p).prop("placeholder",e(h).data("placeholder")),e(p).addClass("selected")),e(p).prop("autocomplete",e(h).data("autocomplete")),e(h).data("withoutSearch")&&!e(h).data("allowFreeInput")&&(e(p).addClass("without-search form-control"),e(p).prop("readonly",!0)),e(h).data("multiple")?e(h).addClass("multiple-select"):e(h).addClass("single-select"),d.selectedElementsHeader&&e(h).find(".selected-elements-header").html(d.selectedElementsHeader),!e(h).find(".multiselect-trigger-button").length){var u=e('<div class="multiselect-trigger-button"></div>');e(h).find("div:first").append(u)}var g=e(h).find(".multiselect-hint");g.length||(g=e('<div class="multiselect-hint"></div>'),e(h).find("div:first").append(g)),"left"===e(h).data("hintPosition")?g.css("right",h.width()):g.css("left",h.width()),e(h).on("click",".multiselect-trigger-button",function(t){t.preventDefault(),t.stopPropagation(),e(p).focus(),e(this).hasClass("del")&&(d.ajaxSettings?(e(f).empty().trigger("change").resetSelectList(),r.hide(),e(h).find("select").is(".lazy-load")&&(o(h,!1,!0),e(p).blur())):e(f).val("").trigger("change"),e(this).removeClass("del"))}),e(r).css({width:e(p).css("width")}),e(h).data("selectAllCheckbox")&&e(r).find("ul").append(e('<li class="select-all"><label data-id="all"><div class="__checkbox select-all-checkbox"></div><span class="element-label">Выбрать все</span></label></li>')),e(f).find("option:not(.disabled)").each(function(){""!==e(this).val()&&(logo=e(h).data("logosFolder")?'<div class="option-logo"><img src="/bundles/gisautoweb/images/select_logos/'+e(h).data("logosFolder")+"/"+e(this).val()+'.png" alt=""></div> ':"",e(r).find("ul").append(e('<li><label data-id="'+e(this).val()+'"><div class="__checkbox"></div>'+logo+'<span class="element-label">'+e(this).html()+"</span></label></li>")))}),e(p).on("focusin",function(){0!==e(r).find("ul").children().length&&e(r).slideDown(100,function(){height=e(r).outerHeight(),windowHeight=window.innerHeight,listTop=e(r)[0].getBoundingClientRect().top,windowHeight-listTop<height&&e(r).outerHeight(windowHeight-listTop),e(r).perfectScrollbar("update")})}),e(p).on("focusout",function(){e(r).slideUp(100),e(h).data("allowFreeInput")&&e(p).val()&&(e(f).append('<option value="'+e(p).val()+'" selected>'+e(p).val()+"</option>").trigger("freeChange"),i(h,e(f).val())),e(p).val(""),e(r).find(".not-found-msg").hide(),n(h)}),e(r).hover(function(){e(p).off("focusout")},function(){e(p).on("focusout",function(){e(r).slideUp(100),e(h).data("allowFreeInput")&&e(p).val()&&(e(f).find("option").removeAttr("selected").prop("selected",!1),e(f).append('<option value="'+e(p).val()+'" selected>'+e(p).val()+"</option>"),i(h,e(f).val())),e(p).val(""),e(r).find(".not-found-msg").hide(),n(h)})}).click(function(){e(p).focus()}),e(r).on("click","li:not(.select-all)",function(l){l.stopPropagation(),e(h).data("multiple")||(e(r).find("div.__checkbox.selected").each(function(){e(this).removeClass("selected")}),e(p).blur(),e(r).slideUp(100),e(p).val(""),e(r).find(".not-found-msg").hide()),e(this).find("div.__checkbox").toggleClass("selected"),t(h),e(this).addClass("current-option")}),e(r).on("click","li.select-all",function(l){l.stopPropagation(),e(this).find("div.__checkbox").toggleClass("selected");var i=e(this).find("div.__checkbox").hasClass("selected");e(r).find("li:not(.select-all)").each(function(){e(this).find("div.__checkbox").toggleClass("selected",i)}),t(h),e(this).addClass("current-option")}),e(r).find("li").hover(function(){e(this).parent().find("li.current-option").removeClass("current-option"),e(this).addClass("current-option"),s(h,e(this))},function(){e(this).removeClass("current-option"),n(h)}),e(p).on("keydown",function(t){var l,i,a=r.find(".current-option");if(38===t.which||40===t.which||13===t.which||27===t.which||32===t.which&&a.length){switch(t.preventDefault(),t.stopPropagation(),a.length?(l=a.prevAll().filter(":visible").first(),i=a.nextAll().filter(":visible").first(),a.removeClass("current-option")):(l=r.find("li:visible:last"),i=r.find("li:visible:first")),t.which){case 38:l.addClass("current-option");break;case 40:i.addClass("current-option");break;case 13:a.click(),n(h);break;case 32:a&&(a.click(),n(h));break;case 27:e(r).slideUp(100),n(h)}return(a=r.find(".current-option")).length&&(a.position().top<0&&e(r).scrollTop(a.position().top+r.scrollTop()),a.position().top+a.height()>r.height()&&e(r).scrollTop(r.scrollTop()+a.position().top-r.height()+a.height())),s(h,e(this)),!1}}),e(p).on("keyup",function(t){if(e(h).data("withoutSearch"))return!1;if(38===t.which||40===t.which||13===t.which)return!1;if(32===t.which&&r.find(".current-option").length>0)return!1;if(e(h).data("searchString",e(this).val()),d.ajaxSettings&&d.ajaxSettings.loadBySearch)c&&clearTimeout(c),c=setTimeout(function(){e(h).find("select").is(".lazy-load-not-set")?o(h,!0,!0):o(h,!0)},d.ajaxSettings.searchDelay||1e3);else{var l=e(this).val().replace(new RegExp("\\[","ig"),"\\["),i=new RegExp("^("+l+")","ig"),s=new RegExp("^("+a(l)+")","ig"),n=new RegExp("("+l+")","ig"),p=new RegExp("("+a(l)+")","ig"),f=!0,u=!0;d.searchFromStart?(e(r).find(".element-label").each(function(){e(this).text().match(i)||e(this).text().match(s)||!0===e(this).prev().find("input").prop("checked")?(e(this).text().match(n)&&e(this).html(e(this).text().replace(i,'<span class="founded-substring">$1</span>')),e(this).text().match(p)&&e(this).html(e(this).text().replace(s,'<span class="founded-substring">$1</span>')),e(this).closest("li").show(),f=!1,u=!1):e(this).closest("li").hide()}),f&&e(r).find(".element-label").each(function(){e(this).text().match(n)||e(this).text().match(p)||!0===e(this).prev().find("input").prop("checked")?(e(this).text().match(n)&&e(this).html(e(this).text().replace(n,'<span class="founded-substring">$1</span>')),e(this).text().match(p)&&e(this).html(e(this).text().replace(p,'<span class="founded-substring">$1</span>')),e(this).closest("li").show(),u=!1):e(this).closest("li").hide()})):e(r).find(".element-label").each(function(){e(this).text().match(n)||e(this).text().match(p)||!0===e(this).prev().find("input").prop("checked")?(e(this).text().match(n)&&e(this).html(e(this).text().replace(n,'<span class="founded-substring">$1</span>')),e(this).text().match(p)&&e(this).html(e(this).text().replace(p,'<span class="founded-substring">$1</span>')),e(this).closest("li").show(),u=!1):e(this).closest("li").hide()})}u?e(r).find(".not-found-msg").show():e(r).find(".not-found-msg").hide(),e(r).perfectScrollbar("update")}),document.addEventListener("click",function(t){r.is(t.target)||0!==r.has(t.target).length||p.is(t.target)||(e(r).slideUp(100),e(h).find("li").show(),e(r).find(".not-found-msg").hide(),e(p).val(""))},!0),e(f).on("change",function(){l(h)}),l(h);var v=e(h).find("select");return v.is(".lazy-load")&&(v.is(".lazy-load-not-set")?o(h,!1,!0):o(h)),this},e.fn.resetSelectList=function(){var t=e(this).closest(".dropdown-select-search"),i=e(t).find(".select-list"),a=e(t).find("select"),o=e(t).find(".multiselect-trigger-button");return e(i).find("ul").empty(),e(t).data("selectAllCheckbox")&&e(i).find("ul").append(e('<li class="select-all"><label data-id="all"><div class="__checkbox '+e(t).data("checkBoxClass")+' select-all-checkbox"></div><span class="element-label">Выбрать все</span></label></li>')),e(a).find("option:not(.disabled)").each(function(){""!==e(this).val()&&e(i).find("ul").append(e('<li><label data-id="'+e(this).val()+'"><div class="__checkbox '+e(t).data("checkBoxClass")+'"></div><span class="element-label">'+e(this).html()+"</span></label></li>"))}),e(i).find("li").hover(function(){e(this).parent().find("li.current-option").removeClass("current-option"),e(this).addClass("current-option"),s(t,e(this))},function(){e(this).removeClass("current-option"),n(t)}),l(t),o.removeClass("del"),this}});