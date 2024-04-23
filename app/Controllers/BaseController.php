<?php

namespace TanksBattle\Controllers;
use Twig\Environment;

abstract class BaseController
{
  protected ?Environment $twig = null;
  public function __construct(Environment $twig = null) 
  {
    $this->twig = $twig;
  }
}