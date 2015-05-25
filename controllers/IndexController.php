<?php

namespace controllers;

use controllers\Controller;

class IndexController extends Controller {
  public function actionIndex() {
    $this->render('index');
  }
}