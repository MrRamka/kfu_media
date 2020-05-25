<?php


namespace App\Actions\settings;


use App\Action;
use App\Model\Setting;

class GenerateAction extends Action
{
    public function run(): void
    {
        $token = md5(time() . uniqid());
        Setting::save(['token' => $token]);
        die($token);
    }
}