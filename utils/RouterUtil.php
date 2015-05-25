<?php

namespace utils;

class RouterUtil {
  public function __construct() {
    // echo 'Router constructed!';
  }

  public function route($requestMethod, $requestUri, $getArray, $postArray) {
    $parsedUri = $this->parseUri($requestUri);
    var_dump($parsedUri);
    $controllerName = $this->getControllerName($parsedUri);
    $actionName = $this->getActionName($parsedUri);
    if (!$this->fireClass($controllerName, $actionName)) {
      echo "error!";
    }
  }

  protected function parseUri($uri) {
    $uriArray = explode('/', strtok($uri, '?'));
    return $uriArray;
  }

  protected function getControllerName($parsedUri) {
    return 'controllers\\'. ucfirst($parsedUri[1]) . 'Controller';
  }

  protected function getActionName($parsedUri) {
    if (!isset($parsedUri[2]) || empty($parsedUri[2])) {
      return 'actionIndex';
    }
    return 'action' . ucfirst($parsedUri[2]);
  }

  protected function fireClass($controllerName, $actionName) {
    var_dump($controllerName, $actionName);
    var_dump(method_exists($controllerName, $actionName));
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
      $controller = new $controllerName();
      $controller->$actionName();
      return true;
    } else {
      return false;
    }
  }
}