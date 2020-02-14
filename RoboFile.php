<?php
global $yiiApp;
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

// загрузка конфигурации приложения
$config = require __DIR__ . '/tests/app/config/console.php';

// создание и конфигурация приложения, а также вызов метода для обработки входящего запроса
$yiiApp = (new yii\console\Application($config));


use devskyfly\robocmd\DevTestTrait;
use yii\helpers\BaseConsole;

class RoboFile extends \Robo\Tasks
{
    use DevTestTrait;    

    public function testsClear()
    {
        $this->testsClearDatabase();
    }

    public function testsClearDatabase()
    {   
        global $yiiApp;
        $db = $yiiApp->db;
        $dbSchema = $db->schema;
        $tables = $dbSchema->getTableNames();

        BaseConsole::stdout("Clear db:".PHP_EOL);
        foreach ($tables as $table) {
            if ($table != "migration") {
                $db->createCommand()->truncateTable($table)->execute();
                BaseConsole::stdout($table.PHP_EOL);
            };
        }

    }

}