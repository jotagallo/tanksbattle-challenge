<?php

namespace TanksBattle\Entities;

class Tank extends BaseEntity
{
  protected function setCollection(): string
  {
    return 'tanks';
  }
}