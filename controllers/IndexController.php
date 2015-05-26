<?php

namespace controllers;

use core\controllers\Controller;

class IndexController extends Controller {
  public function actionIndex() {
    $this->render('index');
  }
}