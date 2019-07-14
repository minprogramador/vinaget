<?php

use Vina\App;
use Vina\Youtube;
use Vina\Download;

require_once __DIR__ . '/vendor/autoload.php';


$url = 'https://www.youtube.com/watch?v=N2TfC9lpPJk';

$You = new Youtube();

$debug = $You->FreeLeech($url);

echo $debug;