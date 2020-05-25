<?php


namespace App\Actions\settings;


use App\Action;
use App\Model\Setting;

class MainAction extends Action
{
    public function run(): void
    {
        $this->title = 'Настройки';
        $settings = Setting::all();
        $this->render("settings/index", ['settings' => $settings]);
    }
}