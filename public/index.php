<?php

require "../vendor/autoload.php";

use App\Phpdotenv\DotEnv;

$dotenv = new DotEnv('../.env');
$dotenv->load();
