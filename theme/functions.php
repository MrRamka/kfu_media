<?php
function enqueue_styles() {
    wp_enqueue_style('main', get_stylesheet_directory_uri ().'/style.css');
    wp_enqueue_style('airdatepicker.min', get_stylesheet_directory_uri ().'/styles/airdatepicker.min.css');
    wp_enqueue_style('autocomplete.min', get_stylesheet_directory_uri ().'/styles/autocomplete.min.css');
    wp_enqueue_style('cs-select', get_stylesheet_directory_uri ().'/styles/cs-select.css');
    wp_enqueue_style('datepicker.min', get_stylesheet_directory_uri ().'/styles/datepicker.min.css');
    wp_enqueue_style('dotnav.min', get_stylesheet_directory_uri ().'/styles/dotnav.min.css');
    wp_enqueue_style('font-awesome.min', get_stylesheet_directory_uri ().'/styles/font-awesome.min.css');
    wp_enqueue_style('form-file.min', get_stylesheet_directory_uri ().'/styles/form-file.min.css');
    wp_enqueue_style('form-select.min', get_stylesheet_directory_uri ().'/styles/form-select.min.css');
    wp_enqueue_style('header', get_stylesheet_directory_uri ().'/styles/header.css');
    wp_enqueue_style('ion.rangeSlider', get_stylesheet_directory_uri ().'/styles/ion.rangeSlider.css');
    wp_enqueue_style('item-hider', get_stylesheet_directory_uri ().'/styles/item-hider.css');
    wp_enqueue_style('jquery.datetimepicker', get_stylesheet_directory_uri ().'/styles/jquery.datetimepicker.css');
    wp_enqueue_style('jquery.fancybox', get_stylesheet_directory_uri ().'/styles/jquery.fancybox.css');
    wp_enqueue_style('jquery.fancybox.min', get_stylesheet_directory_uri ().'/styles/jquery.fancybox.min.css');
    wp_enqueue_style('jquery.mmenu.all', get_stylesheet_directory_uri ().'/styles/jquery.mmenu.all.css');
    wp_enqueue_style('login', get_stylesheet_directory_uri ().'/styles/login.css');
    wp_enqueue_style('modificators', get_stylesheet_directory_uri ().'/styles/modificators.css');
    wp_enqueue_style('multiple-select', get_stylesheet_directory_uri ().'/styles/multiple-select.css');
    wp_enqueue_style('popup', get_stylesheet_directory_uri ().'/styles/popup.css');
    wp_enqueue_style('simple-line-icons', get_stylesheet_directory_uri ().'/styles/simple-line-icons.css');
    wp_enqueue_style('slick', get_stylesheet_directory_uri ().'/styles/slick.css');
    wp_enqueue_style('slidenav.min', get_stylesheet_directory_uri ().'/styles/slidenav.min.css');
    wp_enqueue_style('slider.min', get_stylesheet_directory_uri ().'/styles/slider.min.css');
    wp_enqueue_style('slideshow.min', get_stylesheet_directory_uri ().'/styles/slideshow.min.css');
    wp_enqueue_style('sticky.min', get_stylesheet_directory_uri ().'/styles/sticky.min.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri ().'/styles/style.css');
    wp_enqueue_style('uikit', get_stylesheet_directory_uri ().'/styles/uikit.css');
    wp_enqueue_style('uikit.min', get_stylesheet_directory_uri ().'/styles/uikit.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
    wp_enqueue_script('_slider.min', get_stylesheet_directory_uri ().'/js/_slider.min.js');
    wp_enqueue_script('airdatepicker.min', get_stylesheet_directory_uri ().'/js/airdatepicker.min.js');
    wp_enqueue_script('autocomplete.min', get_stylesheet_directory_uri ().'/js/autocomplete.min.js');
    wp_enqueue_script('classie', get_stylesheet_directory_uri ().'/js/classie.js');
    wp_enqueue_script('datepicker.min', get_stylesheet_directory_uri ().'/js/datepicker.min.js');
    wp_enqueue_script('form-select.min', get_stylesheet_directory_uri ().'/js/form-select.min.js');
    wp_enqueue_script('header', get_stylesheet_directory_uri ().'/js/header.js');
    wp_enqueue_script('helpers', get_stylesheet_directory_uri ().'/js/helpers.js');
    wp_enqueue_script('ion.rangeSlider', get_stylesheet_directory_uri ().'/js/ion.rangeSlider.js');
    wp_enqueue_script('iscroll', get_stylesheet_directory_uri ().'/js/iscroll.js');
    wp_enqueue_script('jquery', get_stylesheet_directory_uri ().'/js/jquery-1.12.4.min.js');
    wp_enqueue_script('jquery.datetimepicker.full', get_stylesheet_directory_uri ().'/js/jquery.datetimepicker.full.min.js');
    wp_enqueue_script('jquery.datetimepicker', get_stylesheet_directory_uri ().'/js/jquery.datetimepicker.min.js');
    wp_enqueue_script('jquery.fancybox.min', get_stylesheet_directory_uri ().'/js/jquery.fancybox.min.js');
    wp_enqueue_script('jquery.masked', get_stylesheet_directory_uri ().'/js/jquery.maskedinput.min.js');
    wp_enqueue_script('jquery.mmenu.all', get_stylesheet_directory_uri ().'/js/jquery.mmenu.all.min.js');
    wp_enqueue_script('jquery.mmenu.min', get_stylesheet_directory_uri ().'/js/jquery.mmenu.min.all.js');
    wp_enqueue_script('jquery.prettyselect', get_stylesheet_directory_uri ().'/js/jquery.prettyselect.js');
    wp_enqueue_script('login', get_stylesheet_directory_uri ().'/js/login.js');
    wp_enqueue_script('modernizr', get_stylesheet_directory_uri ().'/js/modernizr-custom.js');
    wp_enqueue_script('multiple-select', get_stylesheet_directory_uri ().'/js/multiple-select.js');
    wp_enqueue_script('multiple-select-helpers', get_stylesheet_directory_uri ().'/js/multiple-select-helpers.js');
    wp_enqueue_script('popup', get_stylesheet_directory_uri ().'/js/popup.js');
    wp_enqueue_script('script', get_stylesheet_directory_uri ().'/js/script.js');
    wp_enqueue_script('selectFix', get_stylesheet_directory_uri ().'/js/selectFix.js');
    wp_enqueue_script('slick', get_stylesheet_directory_uri ().'/js/slick.min.js');
    wp_enqueue_script('slider', get_stylesheet_directory_uri ().'/js/slider.js');
    wp_enqueue_script('slider.min', get_stylesheet_directory_uri ().'/js/slider.min.js');
    wp_enqueue_script('slideset.min', get_stylesheet_directory_uri ().'/js/slideset.min.js');
    wp_enqueue_script('slider.min', get_stylesheet_directory_uri ().'/js/slider.min.js');
    wp_enqueue_script('slideshow.min', get_stylesheet_directory_uri ().'/js/slideshow.min.js');
    wp_enqueue_script('sticky.min', get_stylesheet_directory_uri ().'/js/sticky.min.js');
    wp_enqueue_script('uikit', get_stylesheet_directory_uri ().'/js/uikit.js');
    wp_enqueue_script('timepicker.min', get_stylesheet_directory_uri ().'/js/timepicker.min.js');
    wp_enqueue_script('uikit.min', get_stylesheet_directory_uri ().'/js/uikit.min.js');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
?> 