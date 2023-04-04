<?php

namespace Tests\Unit\Helpers;

use Mockery;
use PDO;
use ReturnTypeWillChange;

class TestPDO extends PDO
{
    public array $queries = [];

    public int $counter = 1;

    #[ReturnTypeWillChange]
    public function prepare($query, $options = [])
    {
        $this->queries[] = $query;

        $stmt = Mockery::mock('PDOStatement');
        $stmt->shouldReceive('bindValue')->zeroOrMoreTimes();
        $stmt->shouldReceive('execute');
        $stmt->shouldReceive('fetchAll')->andReturn([['id' => 1, 'point' => 'POINT(1 2)']]);
        $stmt->shouldReceive('rowCount')->andReturn(1);

        return $stmt;
    }

    #[ReturnTypeWillChange]
    public function lastInsertId($name = null): int
    {
        return $this->counter++;
    }

    public function resetQueries(): void
    {
        $this->queries = [];
    }
}
