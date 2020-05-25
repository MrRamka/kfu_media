<?php

/*
 * Plugin Name: Media Parser
 */

require_once 'App/App.php';
require_once 'App/Route.php';
require_once 'App/Render.php';
require_once 'App/MetaBox.php';
require_once 'App/Setting.php';
require_once 'App/Actions/post/GetAction.php';
require_once 'App/Actions/post/NewAction.php';
require_once 'App/Actions/post/UpdateAction.php';
require_once 'App/Actions/post/UploadAction.php';
require_once 'App/Actions/post/ArticleAction.php';
require_once 'App/Actions/post/PublishAction.php';

register_activation_hook(__FILE__, ['mediaparser\App', 'activate']);

add_action('init', ['mediaparser\App', 'init']);

add_action('add_meta_boxes', ['mediaparser\App', 'metaBox']);
add_action('admin_enqueue_scripts', ['mediaparser\MetaBox', 'metaBoxScripts']);

add_action('admin_menu', ['mediaparser\Setting', 'pluginPage']);
add_action('admin_init', ['mediaparser\Setting','pluginSettings']);