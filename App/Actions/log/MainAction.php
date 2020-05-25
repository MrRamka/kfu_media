<?php


namespace App\Actions\log;


use App\Action;
use App\App;
use App\Logger\Logger;
use App\Model\Log;

class MainAction extends Action
{
    public function run(): void
    {
        $this->title = 'Логи';
        $filter = [];

        $page = abs($_GET['page'] ?? 1);
        $pager = ['limit' => 50, 'page' => $page];
        $order = ['id', 'DESC'];
        $logs = Log::tableData($filter, $pager, $order);

        $this->render('log/index', ['logs' => $logs]);
    }
}