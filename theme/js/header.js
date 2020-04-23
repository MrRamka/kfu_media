(function($){

	$(document).on('click', '#main-menu li.more.closed', function(){
		if( $('#mobile-menu .cs-options .iScrollVerticalScrollbar').length == 0 ){
			var iScrollMenu = new IScroll('#mobile-menu .cs-options > ul', {
				mouseWheel: true,
				preventDefaultException: { tagName: /^(DIV|UL|LI|A|SPAN)$/ },
				scrollbars: true
			});
		}
	});

	$(document).on('click', '.language .cs-skin-overlay .cs-placeholder', function(){
		if( $('.language .cs-skin-overlay .iScrollVerticalScrollbar').length == 0 ){
			var iScrollLang = new IScroll('.language .cs-skin-overlay .cs-options > ul', {
				mouseWheel: true,
				preventDefaultException: { tagName: /^(DIV|UL|LI|A|SPAN)$/ },
				scrollbars: true
			});
		}
	});

	$(document).on('click', '#content.has-left-sidebar .left-col-toggler', function(){
		$('#content.has-left-sidebar').toggleClass('opened');
	});

})(jQuery);

function showPreloader(){
	jQuery('body').css('overflow-y', 'hidden');
	jQuery('.loader-wrapper').show();
}

function hidePreloader(){
	jQuery('body').css('overflow-y', 'visible');
	jQuery('.loader-wrapper').hide();
}

function selectInit(){

	jQuery('select:not(.cs-skin-border)').each(function(){
		var select = jQuery(this).closest('.cs-select[tabindex="0"]');
		select.find('.cs-options > ul').append('<div class = "cs-select-close fa fa-times"></div>');
		if( jQuery(this).is('.cs-someone-active') ){
			select.find('li[data-value="'+ jQuery(this).val() +'"]').addClass('cs-selected');
		}
	});

	languageSelectResize();

}

function languageSelectResize(){

	var $select = jQuery('.language .cs-select');
	var $closeBtn = $select.find('.cs-select-close');
	var $options = $select.find('.cs-options');

	// обрабатываем выбор языков
	if(Modernizr.mq("only screen and (min-width: 768px)")){

		if( $select.is('.cs-skin-overlay') ){
			jQuery('.language .cs-skin-overlay')
				.removeClass('cs-skin-overlay')
				.addClass('cs-skin-elastic');
			if( $closeBtn.length > 0 ){
				$closeBtn.remove();
			}
		}

	} else{

		if( $select.is('.cs-skin-elastic') ){
			$options.hide(100, function(){
				jQuery('.language .cs-skin-elastic')
					.removeClass('cs-skin-elastic')
					.addClass('cs-skin-overlay');
				if( $closeBtn.length == 0 ){
					$options.append('<div class = "cs-select-close fa fa-times"></div>');
				}
				$options.show();
			});
		}

	}

}

function mobileMenuInit(){

	jQuery('#mobile-menu').mmenu({
		"navbars": [{
			"position": "top",
			"content": [
				"searchfield",
				"close",
			]
		}, {
			"position": "bottom",
			"content": [
				"<a class='fa fa-envelope' href='#/'></a>",
				"<a class='fa fa-twitter' href='#/'></a>",
				"<a class='fa fa-facebook' href='#/'></a>"
			]
		}],
		"offCanvas": {
			"position": "right"
		},
		"navbar": {
			"title": "Мобильное меню",
			"titleLink": "none",
			"add": "true"
		},
		"searchfield": {
			"placeholder": "Что ищем?",
			"noResults": "Результатов не найдено",
			"add": "true"
		},
		"slidingSubmenus": false
	});

}

function menusScroll(){

	/*setTimeout(function(){
		if( jQuery('.mm-menu.mm-opened .mm-panel.mm-current .iScrollVerticalScrollbar').length == 0 ){
			var iScroll = new IScroll('.mm-menu.mm-opened .mm-panel.mm-current', {
				mouseWheel: true,
				preventDefaultException: { tagName: /^(LI|A|SPAN|INPUT)$/ },
				scrollbars: true
			});
		}
	}, 500);*/

}

/*function contentOffset(){

	var headerHeight = jQuery('header').outerHeight(true);
	var sliderHeight = jQuery('#slider').outerHeight(true);
	var underSliderMenuHeight = jQuery('#under-slider-menu').outerHeight(true);
	//var footerHeight = jQuery('footer').outerHeight(true);
	//return headerHeight + sliderHeight + underSliderMenuHeight + footerHeight;
	return headerHeight + sliderHeight + underSliderMenuHeight;

}*/
