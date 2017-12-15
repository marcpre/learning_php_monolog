<?php
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\LineFormatter;


// the default date format is "Y-m-d H:i:s"
$dateFormat = "Y n j, g:i a";
// the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
$output = "%datetime% > %level_name% > %message% %context% %extra%\n";
// finally, create a formatter
$formatter = new LineFormatter($output, $dateFormat);

// create a log channel
$stream = new StreamHandler(__DIR__.'logs/logFiles.log', Logger::WARNING);
$stream->setFormatter($formatter);

$log = new Logger('my_logger');
$log->pushHandler($stream);


// add records to the log
$log->warning('Foo');
$log->error('Bar');