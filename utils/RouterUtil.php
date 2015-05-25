<?php

namespace utils;

class RouterUtil {
  public function __construct() {
    echo 'Router constructed!';
  }

  public function route($requestMethod, $requestUri, $getArray, $postArray) {
    var_dump($requestUri);
  }

}