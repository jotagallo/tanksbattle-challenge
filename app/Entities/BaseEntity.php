<?php

namespace TanksBattle\Entities;
use TanksBattle\Repository\DbConnection;

abstract class BaseEntity
{
  use DbConnection;
  private string $collection;
  abstract protected function setCollection(): string;

  public function __construct()
  {
    $this->collection = $this->setCollection();
  }

  protected function find($filter = [], $options = []): array
  {
    $cl = $this->_collection($this->collection);
    $results = $cl->find($filter, $options);
    return $this->_parse($results);
  }

  public function getAll(): array
  {
    return $this->find();
  }
}