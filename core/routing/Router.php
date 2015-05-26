<?php

namespace core\routing;

/**
 * Basis Router class
 */

class Router {

  /**
    * This method selects propertly controller and its action, or render 404
    * error page
    * @param string $requestMethod - request method (GET, POST, etc)
    * @param string $requestUri - contains request URI
    * @param array $getArray - contains $_GET array
    * @param array $postArray - contains $_POST array
    * @return null
    */
  public function route($requestMethod, $requestUri, $getArray, $postArray) {
    $parsedUri = $this->parseUri($requestUri);
    $controllerName = $this->getControllerName($parsedUri);
    $actionName = $this->getActionName($parsedUri);
    if (!$this->fireClass($controllerName, $actionName)) {
      require($_SERVER['DOCUMENT_ROOT'] . '/views/errors/404.php');
    }
  }
  /**
    * This method explodes URI based on '/' and removes query string
    * @param string $uri - URI string
    * @return array
    */
  protected function parseUri($uri) {
    $uriArray = explode('/', strtok($uri, '?'));
    return $uriArray;
  }

  /**
   * This method produces controller name based on URI
   * @param array $parsedUri
   * @return string
   */

  protected function getControllerName($parsedUri) {
    if ($parsedUri[1] === '') {
      return 'controllers\\IndexController';
    }
    return 'controllers\\'. ucfirst($parsedUri[1]) . 'Controller';
  }

  /**
   * Method returnts controller action (method name) based on URI
   * @param array $parseUri - parsed URI array
   * @return string
   */

  protected function getActionName($parsedUri) {
    // Added to handle root (index) action
    if ($parsedUri[1] === '') {
      return 'actionIndex';
    }
    if (!isset($parsedUri[2]) || empty($parsedUri[2])) {
      return 'actionIndex';
    }
    return 'action' . ucfirst($parsedUri[2]);
  }

  /**
   * This method launches class method (action). Returns false if class or
   * method doesn't exist
   * @param string $controllerName - name of controller
   * @param string @actionName - name of action
   * @return bool
   */

  protected function fireClass($controllerName, $actionName) {
    // Check if controller and its method exists
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
      $controller = new $controllerName();
      $controller->$actionName();
      return true;
    } else {
      return false;
    }
  }
}