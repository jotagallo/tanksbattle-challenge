<?php

namespace TanksBattle\Repository;
use MongoDB\Client;
use MongoDB\Database;
use MongoDB\Collection;
use MongoDB\Driver\Cursor;
use MongoDB\Driver\ServerApi;
use MongoDB\Driver\Query;

trait DbConnection 
{
  protected function _db(): Database
  {
    try {
      require __DIR__ . '/../settings.php';
      $client = new Client($mongodb, [], ['serverApi' => new ServerApi(ServerApi::V1)]);
      return $client->$dbname;
    } catch (\Exception $e) {
        printf($e->getMessage()); exit(1);
    }
  }

  protected function _collection(string $collection): Collection
  {
    return $this->_db()->$collection;
  }

  protected function _query(array $filter, array $options): Query
  {
    return new Query($filter, $options);
  }

  protected function _parse(Cursor $cursor): array
  {
    $return = [];
    foreach ($cursor as $row) {
      $return[(string) $row->_id] = $row->jsonSerialize();
    }
    return $return;
  }

}