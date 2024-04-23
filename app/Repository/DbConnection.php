<?php

namespace TanksBattle\Repository;
use Exception;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;

trait DbConnection 
{
  protected Client $client;
  public function __construct()
  {
    parent::__construct(...func_get_args());
    try {
      require_once __DIR__ . '/../settings.php';
      $this->client = new Client($mongodb, [], ['serverApi' => new ServerApi(ServerApi::V1)]);
    } catch (Exception $e) {
        printf($e->getMessage()); exit(1);
    }
  }
}