<?php
namespace PH7\FlashDate;

use Slim\App;
use Slim\Views\TwigExtension;
use Symfony\Component\Yaml\Parser;

$oYaml = new Parser;
$aDbInfo = $oYaml->parse(file_get_contents(PH7_PRIVATE_PATH . 'config/db.yml'))['db'];
$aGeneral = $oYaml->parse(file_get_contents(PH7_PRIVATE_PATH . 'config/general.yml'))['general'];
unset($oYaml);

$aDbConnection = [
    'dbname' => $aDbInfo['db_name'],
    'user' => $aDbInfo['db_user'],
    'password' => $aDbInfo['db_pass'],
    'host' => $aDbInfo['db_host'],
    'driver' => $aDbInfo['db_driver'],
];

$aAppConfig = [
    'settings' => [
        'displayErrorDetails' => ($aGeneral['environment'] == 'development'),
    ],
];
$oConfigContainer = new \Slim\Container($aAppConfig);

$oApp = new App($oConfigContainer);

require PH7_PRIVATE_PATH . 'route.php'; // Get routes

// Run the app!
$oApp->run();
