(function($){

	"use strict";

	$.fancybox.defaults.infobar = false;

	$('input.phone').mask("+7(999) 999-9999");
	/*
  	setTimeout(function(){
	не работает
		hidePreloader();
	}, 8000);*/

	/*$('.range-slider').ionRangeSlider({
 		type: "double",
 		prettify_enabled: false
	});*/

	if( $('#blogs').length ){
		$.get(
			'https://newspaper.kpfu.ru/wp-json/wp_query/args/?post_type=post&orderby=date&order=DESC&posts_per_page=6&meta_query%5B0%5D%5Bkey%5D=post_show_on_media&meta_query%5B0%5D%5Bvalue%5D=1',
			function(data) {
				if( $.isArray(data) ){
					var html = '<div class="block-title">Блоги</div><div class = "uk-slidenav-position"><div class = "uk-slider-container"><div class = "uk-slider uk-grid-width-large-1-2">';
					$.each(data, function(index, value) {
						html += '<div class="blogItem uk-slide-after"><div class="blogItem-wrapper uk-flex"><a class="blogItem-image" href = "'+ value.link +'" style="background:url('+ value.post_image +')"></a><div class="blogItem-content"><div class="blogItem-author">'+ value.post_author +'</div><a class="blogItem-title" href="'+ value.link +'">'+ value.title.rendered +'</a></div></div></div>';
					});
					html += '</div></div><a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slider-item="previous" draggable="false"><svg viewBox="0 0 21.4 40"><path class="st0" d="M19,39.6c0.3,0.3,0.6,0.4,1,0.4c0.4,0,0.7-0.1,1-0.4c0.6-0.6,0.6-1.4,0-2L3.4,20L21,2.4c0.6-0.6,0.6-1.4,0-2 c-0.6-0.6-1.4-0.6-2,0L0.4,19c-0.6,0.6-0.6,1.4,0,2L19,39.6z M19,39.6"/></svg></a><a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slider-item="next" draggable="false"><svg viewBox="0 0 21.4 40"><path class="st0" d="M2.4,0.4C2.1,0.1,1.8,0,1.4,0C1,0,0.7,0.1,0.4,0.4c-0.6,0.6-0.6,1.4,0,2L18,20L0.4,37.6c-0.6,0.6-0.6,1.4,0,2 c0.6,0.6,1.4,0.6,2,0L21,21c0.6-0.6,0.6-1.4,0-2L2.4,0.4z M2.4,0.4"/></svg></a></div>';
					$('#blogs').html(html);
					UIkit.slider( $('#blogs .uk-slidenav-position') );
				}
			}
		);
	}

	$('.pretty-select').prettyselect({
		onlyValuedOptions: true
	});
	var selectCounter = 0;
	$('.prettyselect-wrap').each(function(){
		selectCounter += 1;
		$(this).attr('data-counter', selectCounter);
	});

	// инициализируем страницу - действия те же что при ресайзе
	windowResize();

	// красивые селекты
	[].slice.call( document.querySelectorAll( '.language select' ) ).forEach( function(el) {
		new SelectFx(el, {
			stickyPlaceholder: false,
			onChange:function(el){
				$('.language').attr('data-lang', el);
			}
		});
	});
	[].slice.call( document.querySelectorAll( '#mobile-menu select' ) ).forEach( function(el) {
		new SelectFx(el, {
			stickyPlaceholder: false
		});
	});

	$(document).on('click', '.cs-skin-overlay .cs-optgroup li, .cs-select-close', function(){
		var select = $(this).closest('.cs-select');
		var link = select.find('select').val();
		if( select.is('.cs-links') && link != 'javascript:void(0);' && typeof(link) != 'undefined' ){
			location.href = $(this).data('value');
		}
		select.removeClass('cs-active');
		$('body').css('overflow-y', 'visible');
	});

	// обработчик поиска по сайту
	$('.search-btn').on('click', function(){
		$(this).toggleClass('opened')
		var searchArea = $('#search-area');
		if( searchArea.is('.opened') ) {
			if(Modernizr.mq("only screen and (max-width: 520px)")){
				searchArea
					.removeClass('opened')
					.stop(true, true)
					.animate({
						'margin-top': '-52px'
					}, 300);
			} else {
				searchArea
					.removeClass('opened')
					.stop(true, true)
					.animate({
						'margin-top': '-72px'
					}, 300);
			}
		} else {
			searchArea
				.addClass('opened')
				.stop(true, true)
				.animate({
					'margin-top': '0px'
				}, 300);
		}
	});

	// обработчик hider more
	$('*').on('click', function(e){
		var elem = $(this).parent();
		if( elem.is('li.more') || elem.is('#overflow') ){
			if( $('#main-menu > li').length > 1) {
				e.stopPropagation();
				elem
					.toggleClass('opened')
					.toggleClass('closed');
			} else {
				$('#mobile-menu > .cs-skin-overlay').addClass('cs-active');
				$('body').css('overflow-y', 'hidden');
			}
		} else {
			$('.hider-wrapper li.more.opened')
				.removeClass('opened')
				.addClass('closed');
		}
	});

	// отдельно запускаем то, что должно быть запущено после загрузки страницы
	$(window).on('load', function(){

		selectInit();

		mobileMenuInit();

		setTimeout(function(){

			itemHider( $('#main-menu'), 3, 7 );

			if(Modernizr.mq("only screen and (min-width: 960px)") ){
				var height = $(window).outerHeight() - $('header').outerHeight();
				$('#content').css('min-height', height);
			}

		}, 0);

		/* не работает функция
		hidePreloader();*/

	});



$(window).resize(function() {

	// закрываем мобильное меню
	$("#mobile-menu").data("mmenu").close();

	itemHider( $('#main-menu'), 3, 7 );

	// обрабатываем ресайз
	windowResize();

	if( $('#main-menu > li:not(.more)').length == 0 || Modernizr.mq("only screen and (max-width: 520px)") ){
		mainMenuSlideStart();
	}

	languageSelectResize();

});

function windowResize() {

}

function mainMenuSlideStart(){

	if( $('header .slide-menu').length == 0 ){
		$('header .header-top').after('<ul class = "slide-menu clearfix">'+ $('#overflow').html() +'</ul>');
		$('header .slide-menu').slick({
			infinite: false,
			prevArrow: '<div class="slick-prev fa fa-angle-left"></div>',
			nextArrow: '<div class="slick-next fa fa-angle-right"></div>',
		});
	}

}

function mainMenuSlideStop(){

	$('header .slide-menu').slick('unslick').remove();

}

function itemHider($wrapper, $minLimit, $maxLimit) {

	if( !$wrapper.hasClass('hider-wrapper') ){
		$wrapper.addClass('hider-wrapper');
	}

	var $navItemMore = $wrapper.children('li.more');
	var $overflow = $wrapper.find('#overflow');
	$navItemMore.before( $overflow.children('li') );
	var $navItems = $wrapper.children('li:not(.more)');
	var $navItemsLength = $navItems.length;

	if( $navItemMore.is('.opened') ){
		$navItemMore
			.toggleClass('opened')
			.toggleClass('closed');
	}

	if($maxLimit && $navItemsLength > $maxLimit){
		while($navItemsLength > $maxLimit) {
			$navItems.last().prependTo($overflow);
			$navItems.splice(-1,1);
			$navItemsLength -= 1;
		}
		$navItemMore.show();
	}

	var navItemMoreWidth;
	var navItemWidth;
	navItemMoreWidth = navItemWidth = $navItemMore.outerWidth(true);
	var menuWidth = $wrapper.width() - navItemMoreWidth;

	$navItems.each(function() {
		navItemWidth += $(this).outerWidth(true);
	});

	if(menuWidth > navItemMoreWidth){
		while (navItemWidth > menuWidth) {
			navItemWidth -= $navItems.last().outerWidth(true);
			$navItems.last().prependTo($overflow);
			$navItems.splice(-1,1);
			$navItemsLength -= 1;
		}
		$navItemMore.show();
	} else {
		$navItemMore.hide();
		$overflow
	}

	if($minLimit){
		if($navItemsLength < $minLimit){
			while($navItemsLength > 0) {
				$navItems.last().prependTo($overflow);
				$navItems.splice(-1,1);
				$navItemsLength -= 1;
			}
			$navItemMore.hide();
			mainMenuSlideStart();
		} else {
			mainMenuSlideStop();
		}
	}

}


})(jQuery);
