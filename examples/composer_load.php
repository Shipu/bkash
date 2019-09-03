<?php
require __DIR__.'/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

$config = include(__DIR__.'/../config/bkash.php');
