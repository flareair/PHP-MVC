<?php

namespace core;

/**
 * Core App singletone class
 */
class App {
  /**
   * Stores App instance
   * @var App $_instance
   */
  protected static $_instance;

  /**
   * Stores App config
   * @var array $config
   */
  public $config;

  /**
   * Protected constructor, access only from getInstance() method
   * @param array $configArray - array with app configuration (name, db,
   * etc.)
   * @return null
   */

  protected function __construct(array $configArray) {
    $this->config = $configArray;
  }

  /**
   * Private clone method, deny to clone singletone
   * @return null
   */

  private function __clone() {}

  /**
   * Private wakeup method, deny to wakeup singletone
   * @return null
   */

  private function __wakeup() {}

  /**
   * Creates new instance of App or returns existant, also injects $config
   * array into constructor
   * @param array $configArray - array with app configuration
   * @return App $self::$_instance
   */

  public static function getInstance(array $configArray = null) {
    if (self::$_instance === null) {
      self::$_instance = new self($configArray);
    }
    return self::$_instance;
  }
}