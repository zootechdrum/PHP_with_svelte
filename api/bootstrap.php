<?php


require_once 'config/config.php';
require_once 'helpers/helper.php';

// Autoload Core Library
spl_autoload_register(function ($className) {
  require_once './libraries/' . $className . '.php';
});
