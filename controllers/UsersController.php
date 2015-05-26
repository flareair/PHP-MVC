<?php
namespace controllers;

use core\controllers\Controller;

class UsersController extends Controller {
  public $pageName = 'Users page';

  public function actionIndex() {
    $this->render('index', 'Hello world!');
  }
}