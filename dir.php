<?php

use App\Model\Parser;

$dirs = scandir(__DIR__ . '/../../../Parsers');
unset($dirs[0]);
unset($dirs[1]);
foreach ($dirs as $dir) {
    $name = explode('Parser', $dir)[0];
    Parser::insert([
        'name' => $name,
        'alias' => strtolower($name),
        'namespace' => 'Parsers\\' . $dir . '\\Parser',
        'namespace_article' => 'Parsers\\' . $dir . '\\ArticleParser',
        'enabled' => 1,
        'auto_update' => 1
    ]);
}
exit;