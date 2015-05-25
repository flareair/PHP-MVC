<?php

use utils\RouterUtil;

define(ENV, 'develop');

if (ENV === 'develop') {
  ini_set('display_errors',1);
  error_reporting(E_ALL);
}

require($_SERVER['DOCUMENT_ROOT'] . '/utils/__autoload.php');


$router = new RouterUtil();