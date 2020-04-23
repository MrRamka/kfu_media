<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="mm-page mm-slideout" id="mm-0">
        <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
            <div class="content-wrapper main">
                <div class="loader-wrapper" style="display: none;">
                    <div class="cssload-loader">
                        <div class="cssload-inner cssload-one"></div>
                        <div class="cssload-inner cssload-two"></div>
                        <div class="cssload-inner cssload-three"></div>
                    </div>
                </div>
                <div id="search-area">
                    <form id="search" type="get" action="<?php echo home_url( '/' ) ?>">
                        <input type="text" placeholder="Что ищем?" name="text">
                        <input name="searchid" value="2060946" type="hidden">
                    </form>
                </div>
                <header>
                    <div class="header-top uk-clearfix">
                        <a class="login loginPopup-trigger" href="#">Вход</a>
                        <a class="home" href="<?php echo home_url( '/' ).'wordpress' ?>"><i data-icon=""></i></a>
                        <ul id="main-menu" class="hider-wrapper">
                            <li><a href="//rector.kpfu.ru">Сайт ректора</a></li>
                            <li><a href="//admissions.kpfu.ru">Абитуриенту</a></li>
                            <li><a href="//students.kpfu.ru">Студенту</a></li>
                            <li><a href="//alumni.kpfu.ru">Выпускникам</a></li>         
                            <li class="more closed" style="display: list-item;">
                                <a href="javascript:void(0);">...</a>
                                <ul id="overflow">
                                    <li>
                                        <a href="//career.kpfu.ru/">Работникам и работодателям</a>
                                    </li>
                                    <li>
                                        <a href="//inno.kpfu.ru">Инновации</a>
                                    </li>
                                    <li>
                                        <a href="//museums.kpfu.ru">Музеи</a>
                                    </li>
                                    <li>
                                        <a href="//kpfu.ru/library">Библиотека</a>
                                    </li>
                                    <li>
                                        <a href="//newspaper.kpfu.ru/">Газета "Казанский университет"</a>
                                    </li>
                                    <li>
                                        <a href="//tv.kpfu.ru/">UNIVER TV</a>
                                    </li>
                                    <li>
                                        <a href="//darelfonyn.kpfu.ru">Газета "Darelfonyn"</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="actions">
                            <div class="language" data-lang="russian">
                                <div class="cs-select cs-skin-elastic cs-someone-active" tabindex="0">
                                    <div class="cs-options">
                                        <ul>
                                            <li class="cs-optgroup">
                                                <span>Выберите язык:</span>
                                                <ul>
                                                    <li class="russian-ico cs-selected" data-option="" data-value="russian">
                                                        <span>Русский</span>
                                                    </li>
                                                    <li class="english-ico" data-option="" data-value="english">
                                                        <span>English</span>
                                                    </li>
                                                    <li class="spanish-ico" data-option="" data-value="spanish">
                                                        <span>Español</span>
                                                    </li>
                                                    <li class="french-ico" data-option="" data-value="french">
                                                        <span>Français</span>
                                                    </li>
                                                    <li class="german-ico" data-option="" data-value="german">
                                                        <span>Deutsche</span>
                                                    </li>
                                                    <li class="turkish-ico" data-option="" data-value="turkish">
                                                        <span>Türkçe</span>
                                                    </li>
                                                    <li class="arabic-ico" data-option="" data-value="arabic">
                                                        <span>العربية</span>
                                                    </li>
                                                    <li class="chinese-ico" data-option="" data-value="chinese">
                                                        <span>中文</span>
                                                    </li>
                                                </ul>
                                            </li>
                                            <div class="cs-select-close fa fa-times"></div>
                                        </ul>
                                    </div>
                                    <div class="cs-select cs-skin-elastic cs-someone-active" tabindex="0">
                                        <span class="cs-placeholder">Русский</span>
                                        <div class="cs-options">
                                            <ul>
                                                <li class="cs-optgroup">
                                                    <span>Выберите язык:</span>
                                                    <ul>
                                                        <li class="russian-ico cs-selected" data-option="" data-value="russian">
                                                            <span>Русский</span>
                                                        </li>
                                                        <li class="tatar-ico" data-option="" data-value="tatar">
                                                            <span>Татар</span>
                                                        </li>
                                                        <li class="english-ico" data-option="" data-value="english">
                                                            <span>English</span>
                                                        </li>
                                                        <li class="spanish-ico" data-option="" data-value="spanish">
                                                            <span>Español</span>
                                                        </li>
                                                        <li class="french-ico" data-option="" data-value="french">
                                                            <span>Français</span>
                                                        </li>
                                                        <li class="german-ico" data-option="" data-value="german">
                                                            <span>Deutsche</span>
                                                        </li>
                                                        <li class="turkish-ico" data-option="" data-value="turkish">
                                                            <span>Türkçe</span>
                                                        </li>
                                                        <li class="arabic-ico" data-option="" data-value="arabic">
                                                            <span>العربية</span>
                                                        </li>
                                                        <li class="chinese-ico" data-option="" data-value="chinese">
                                                            <span>中文</span>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <div class="cs-select-close fa fa-times"></div>
                                            </ul>
                                        </div>
                                        <select class="cs-select cs-skin-elastic cs-someone-active">
                                            <optgroup label="Выберите язык:">
                                                <option value="russian" data-class="russian-ico" selected="">Русский</option>
                                                <option value="tatar" data-class="tatar-ico">Татар</option>
                                                <option value="english" data-class="english-ico">English</option>
                                                <option value="spanish" data-class="spanish-ico">Español</option>
                                                <option value="french" data-class="french-ico">Français</option>
                                                <option value="german" data-class="german-ico">Deutsche</option>
                                                <option value="turkish" data-class="turkish-ico">Türkçe</option>
                                                <option value="arabic" data-class="arabic-ico">العربية</option>
                                                <option value="chinese" data-class="chinese-ico">中文</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="links">
                                <a href="https://kpfu.ru/sveden/internet-priemnaya"><i class="email-ico" data-icon=""></i></a>
                                <a href="https://kpfu.ru/sveden/karta-vseh-obektov"><i class="sitemap-ico" data-icon=""></i></a>
                                <a class="search-btn" href="javascript:void(0);"><i class="search-ico" data-icon=""></i></a>
                                <img style="height:40px;" src="https://shelly.kpfu.ru/pdf/picture/mainpage_new/6++/6+.png">
                            </div>
                        </div>
                    </div>
                    <div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;"><div data-uk-sticky="" style="margin: 0px;">
                        <div class="header-middle uk-clearfix">
                            <a class="logo" href="/"></a>
                            <a href="#mobile-menu" class="mobile-menu-toggler fa fa-bars"></a>
                            <div class="social">
                                <a class="uk-icon-rss" href="https://media.kpfu.ru/news-rss"></a>
                                <a class="uk-icon-vk" href="https://vk.com/kazan_federal_university"></a>
                                <a class="uk-icon-facebook" href="https://www.facebook.com/KazanUniversity/"></a>
                                <a class="uk-icon-youtube" href="https://www.youtube.com/univertv"></a>
                            </div>
                        </div>
                        <div class="header-bottom">
                            <ul class="menu uk-container uk-container-center">
                                <li class="parent menu-news">
                                    <a href="/news" data-drupal-link-system-path="news">Новости</a>
                                    <div class="submenu-wrapper">
                                        <div class="uk-container uk-container-center uk-flex uk-flex-space-between">
                                            <ul class="submenu">
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D1%8B%D0%B5%20%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u0413\u043b\u0430\u0432\u043d\u044b\u0435 \u043d\u043e\u0432\u043e\u0441\u0442\u0438&quot;]}" data-drupal-link-system-path="news">Главные новости</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D1%80%D0%B5%D0%BA%D1%82%D0%BE%D1%80%D0%B0&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438 \u0440\u0435\u043a\u0442\u043e\u0440\u0430&quot;]}" data-drupal-link-system-path="news">Новости ректората</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%BD%D0%B0%D1%83%D0%BA%D0%B8&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438 \u043d\u0430\u0443\u043a\u0438&quot;]}" data-drupal-link-system-path="news">Новости науки</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438 \u043e\u0431\u0440\u0430\u0437\u043e\u0432\u0430\u043d\u0438\u044f&quot;]}" data-drupal-link-system-path="news">Новости образования</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%B8%D0%BD%D1%81%D1%82%D0%B8%D1%82%D1%83%D1%82%D0%BE%D0%B2&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438 \u0438\u043d\u0441\u0442\u0438\u0442\u0443\u0442\u043e\u0432&quot;]}" data-drupal-link-system-path="news">Новости институтов</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%90%D0%B1%D0%B8%D1%82%D1%83%D1%80%D0%B8%D0%B5%D0%BD%D1%82%D1%83&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u0410\u0431\u0438\u0442\u0443\u0440\u0438\u0435\u043d\u0442\u0443&quot;]}" data-drupal-link-system-path="news">Абитуриенту</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%90%D0%BA%D1%86%D0%B8%D0%B8%2C%20%D0%BC%D0%B5%D1%80%D0%BE%D0%BF%D1%80%D0%B8%D1%8F%D1%82%D0%B8%D1%8F&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u0410\u043a\u0446\u0438\u0438, \u043c\u0435\u0440\u043e\u043f\u0440\u0438\u044f\u0442\u0438\u044f&quot;]}" data-drupal-link-system-path="news">Акции, мероприятия</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%A1%D1%82%D1%83%D0%B4%D0%B5%D0%BD%D1%87%D0%B5%D1%81%D0%BA%D0%B0%D1%8F%20%D0%B6%D0%B8%D0%B7%D0%BD%D1%8C&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u0421\u0442\u0443\u0434\u0435\u043d\u0447\u0435\u0441\u043a\u0430\u044f \u0436\u0438\u0437\u043d\u044c&quot;]}" data-drupal-link-system-path="news">Студенческая жизнь</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%92%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%BD%D0%B8%D0%BA%D1%83&amp;t=&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u0412\u044b\u043f\u0443\u0441\u043a\u043d\u0438\u043a\u0443&quot;],&quot;t&quot;:&quot;&quot;}" data-drupal-link-system-path="news">Выпускнику</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%9C%D0%B5%D0%B6%D0%B4%D1%83%D0%BD%D0%B0%D1%80%D0%BE%D0%B4%D0%BD%D0%BE%D0%B5%20%D1%81%D0%BE%D1%82%D1%80%D1%83%D0%B4%D0%BD%D0%B8%D1%87%D0%B5%D1%81%D1%82%D0%B2%D0%BE&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u041c\u0435\u0436\u0434\u0443\u043d\u0430\u0440\u043e\u0434\u043d\u043e\u0435 \u0441\u043e\u0442\u0440\u0443\u0434\u043d\u0438\u0447\u0435\u0441\u0442\u0432\u043e&quot;]}" data-drupal-link-system-path="news">Международное сотрудничество</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%BA%D0%BB%D0%B8%D0%BD%D0%B8%D0%BA%D0%B8&amp;t=&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438 \u043a\u043b\u0438\u043d\u0438\u043a\u0438&quot;],&quot;t&quot;:&quot;&quot;}" data-drupal-link-system-path="news">Новости клиники</a>
                                                </li>
                                                <li>
                                                    <a href="/news?kn%5B0%5D=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%BB%D0%B8%D1%86%D0%B5%D0%B5%D0%B2&amp;t=&amp;created=" data-drupal-link-query="{&quot;created&quot;:&quot;&quot;,&quot;kn&quot;:[&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438 \u043b\u0438\u0446\u0435\u0435\u0432&quot;],&quot;t&quot;:&quot;&quot;}" data-drupal-link-system-path="news">Новости лицеев</a>
                                                </li>
                                                <li>
                                                    <a href="http://www.newspaper.kpfu.ru">Блоги</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="parent">
                                    <a href="#nopage" data-drupal-link-system-path="<front>" class="is-active">Календарь</a>
                                    <div class="submenu-wrapper">
                                        <div class="uk-container uk-container-center uk-flex uk-flex-space-between">
                                            <ul class="submenu">
                                                <li>
                                                    <a href="/anons" data-drupal-link-system-path="anons">Анонсы</a>
                                                </li>
                                                <li>
                                                    <a href="/events/day" data-drupal-link-system-path="events/day">Календарь на день</a>
                                                </li>
                                                <li>
                                                    <a href="/events/week" data-drupal-link-system-path="events/week">Календарь на неделю</a>
                                                </li>
                                                <li>
                                                    <a href="/events/month" data-drupal-link-system-path="events/month">Календарь на месяц</a>
                                                </li>
                                            </ul>
                                            <a class="offerLink" href="#" data-fancybox="modal" data-src="#send-event">Предложить свое событие</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="parent">
                                    <a href="#nopage" data-drupal-link-system-path="<front>" class="is-active">Для СМИ</a>
                                    <div class="submenu-wrapper">
                                        <div class="uk-container uk-container-center uk-flex uk-flex-space-between">
                                            <ul class="submenu">
                                                <li>
                                                    <a href="/press" data-drupal-link-system-path="press">Пресс-релизы</a>
                                                </li>
                                                <li>
                                                    <a href="/about" data-drupal-link-system-path="about">СМИ о нас</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="parent">
                                    <a href="#nopage" data-drupal-link-system-path="<front>" class="is-active">Медиатека</a>
                                    <div class="submenu-wrapper">
                                        <div class="uk-container uk-container-center uk-flex uk-flex-space-between">
                                            <ul class="submenu">
                                                <li>
                                                    <a href="/photos?sort_by=created_1" data-drupal-link-query="{&quot;sort_by&quot;:&quot;created_1&quot;}" data-drupal-link-system-path="photos">Фотобанк</a>
                                                </li>
                                                <li>
                                                    <a href="/video?kv%5B0%5D=%D0%9E%D1%84%D0%B8%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F%20%D1%85%D1%80%D0%BE%D0%BD%D0%B8%D0%BA%D0%B0&amp;kv%5B1%5D=%D0%A1%D0%BF%D0%BE%D1%80%D1%82&amp;kv%5B2%5D=%D0%9A%D1%83%D0%BB%D1%8C%D1%82%D1%83%D1%80%D0%B0" data-drupal-link-query="{&quot;kv&quot;:[&quot;\u041e\u0444\u0438\u0446\u0438\u0430\u043b\u044c\u043d\u0430\u044f \u0445\u0440\u043e\u043d\u0438\u043a\u0430&quot;,&quot;\u0421\u043f\u043e\u0440\u0442&quot;,&quot;\u041a\u0443\u043b\u044c\u0442\u0443\u0440\u0430&quot;]}" data-drupal-link-system-path="video">Видеоархив</a>
                                                </li>
                                            </ul>
                                            <a class="offerLink" href="#" data-fancybox="modal" data-src="#send-photo">Предложить видео или фото</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="parent">
                                    <a href="/node/178" data-drupal-link-system-path="node/178">TV</a>
                                </li>
                                <li class="parent">
                                    <a href="/node/179" data-drupal-link-system-path="node/179">Радио</a>
                                </li>
                                <li class="parent">
                                    <a href="/edinyy-informacionnyy-centr" data-drupal-link-system-path="node/180">Контакты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>