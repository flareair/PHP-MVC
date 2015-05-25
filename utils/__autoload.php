<?php

function __autoload($className) {
  $classPath = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
  if (!file_exists($classPath)) {
    return null;
  }
  require($classPath);
}