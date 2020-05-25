<?php


namespace App\Actions\stats;


use App\Action;
use App\App;
use App\Model\Upload;

class MainAction extends Action
{
    public function run(): void
    {
        $this->title = 'Статистика';

        $filter = [];
        $pager = ['page' => abs($_GET['page'] ?? 1), 'limit' => 50];
        $order = ['id', 'DESC'];
        $stats = Upload::tableData($filter, $pager, $order);

        if (!empty($stats['data'])) {
            $time = date('Y-m-d H:i:s', strtotime('today'));
            $counts = [
                'new' => App::$app->db()->all("SELECT parser_alias, COUNT(*) as count FROM upload WHERE `status`=0 GROUP BY parser_alias"),
                'update' => App::$app->db()->all("SELECT parser_alias, COUNT(*) as count FROM upload WHERE `status`=1 GROUP BY parser_alias"),
                'new_today' => App::$app->db()->all("SELECT parser_alias, COUNT(*) as count FROM upload WHERE `status`=0 AND `datetime` > '{$time}' GROUP BY parser_alias"),
                'update_today' => App::$app->db()->all("SELECT parser_alias, COUNT(*) as count FROM upload WHERE `status`=1 AND `datetime` > '{$time}' GROUP BY parser_alias"),
            ];
            $parserCount = [];
            foreach ($counts as $mode => $data) {
                foreach ($data as $row) {
                    $parserCount[$row['parser_alias']][$mode] = $row['count'];
                }
            }

            $parsers = [];

            foreach ($parserCount as $key => $item) {
                $parsers[] = '"' . $key . '"';
            }

            $names = App::$app->db()->all('SELECT name, alias FROM parser WHERE alias IN(' . implode(',', $parsers) . ')');
            foreach ($names as $name)
                $names[$name['alias']] = $name['name'];
        }

        $this->render('stats/index', ['stats' => $stats, 'parserCount' => $parserCount, 'parserNames' => $names]);
    }
}