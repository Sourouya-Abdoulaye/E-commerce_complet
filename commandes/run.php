<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Config\Commande_base\Commandes;
Commandes::migrate_and_seed();
