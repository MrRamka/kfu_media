<?php


namespace App\Actions\settings;


use App\Action;
use App\App;
use App\Model\Setting;

class SaveAction extends Action
{
    public function run(): void
    {
        if (isset($_POST['setting'])) {
            $data = $_POST['setting'];

            $status = Setting::save($data);
            if ($status)
                App::$app->route()->setFlash("success", "Настройки сохранены. Не забудьте сменить токен в настройках WordPress.");
            else
                App::$app->route()->setFlash("error", "Произошла ошибка");
        }

        $this->redirect('/settings');
    }
}