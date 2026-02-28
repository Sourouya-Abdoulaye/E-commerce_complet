<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Config\User_base\Database;
$a=Database::migrate_and_seed();
