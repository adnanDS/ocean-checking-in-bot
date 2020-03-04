<?php declare(strict_types=1);

namespace DemigrantSoft\ClockInBot\Infrastructure\Fixtures;

use Doctrine\DBAL\Driver\Connection;

abstract class DbalFixture
{
    protected Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}