<?php


namespace mediaparser;


class Setting
{
    public static function pluginPage()
    {
        add_options_page('Настройки MediaParser', 'MediaParser', 'manage_options', 'mediaparser_slug', ['mediaparser\Setting', 'printPage']);
    }

    public static function printPage()
    {
        Render::render('options');
    }

    public static function pluginSettings()
    {
        register_setting('mediaparser_group', 'mediaparser_domain', ['mediaparser\Setting', 'sanitize']);
        register_setting('mediaparser_group', 'mediaparser_token', ['mediaparser\Setting', 'sanitize']);
        add_settings_section('mediaparser_section', 'Основные настройки', '', 'mediaparser_page');

        add_settings_field('mediaparser_domain', 'Домен парсеров', ['mediaparser\Setting', 'printOption'], 'mediaparser_page', 'mediaparser_section', ['option' => 'mediaparser_domain']);
        add_settings_field('mediaparser_token', 'Токен', ['mediaparser\Setting', 'printOption'], 'mediaparser_page', 'mediaparser_section', ['option' => 'mediaparser_token']);
    }

    public static function sanitize($val)
    {
        return strip_tags($val);
    }

    public static function printOption($value)
    {
        Render::render('option', ['value' => $value]);
    }
}