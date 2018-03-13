<?php
/**actualisation de la session**/
session_start();

/**destruction de la session**/
$_session = [];

require_once __DIR__ . '/../../vendor/autoload.php';
$configs = require __DIR__ . '/../../config/app.conf.php';

use Service\DBConnector;

DBConnector::setConfig($configs['db']);

?>