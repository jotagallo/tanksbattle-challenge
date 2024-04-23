<?php

namespace TanksBattle\Controllers;
use TanksBattle\Repository\DbConnection;

class GameController extends BaseController
{
  use DbConnection;

  public function index() :void
  {
    print $this->twig->render('index.html.twig');
  }
  public function prepare() :void
  {
    print $this->twig->render('prepare.html.twig');
  }
  public function api() :void
  {
    print 'API PATH !';
  }
}