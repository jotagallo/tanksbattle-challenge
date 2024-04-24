<?php

namespace TanksBattle\Entities;

class Player extends BaseEntity
{
  protected function setCollection(): string
  {
    return 'players';
  }
}