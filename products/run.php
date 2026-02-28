<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Config\Product_base\Product;
Product::migrate_and_seed();
