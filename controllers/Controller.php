<?php

namespace controllers;


class Controller {
  public function __construct() {

  }

  public function render($viewName, $variables) {
    $viewPath = $this->getViewPath($viewName);
    if (file_exists($viewPath)) {
      require($_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php');
      require($viewPath);
      require($_SERVER['DOCUMENT_ROOT'] . '/views/partials/footer.php');
    }
    else {
      echo 'No view found!';
    }
  }
  private function getViewPath($viewName) {
    $shortClassName = explode('\\', get_class($this))[1];
    $shortClassName = strtolower(str_replace('Controller', '', $shortClassName));
    return $_SERVER['DOCUMENT_ROOT'] . '/views/' . $shortClassName . '/' . $viewName . '.php';
  }
}