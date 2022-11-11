<?php

namespace App\Repository\Persist;

use App\Repository\Persist\Exception\PersistException;
use Redis;

class RedisRepository implements PersistRepositoryInterface
{
    /**
     * @var Redis
     */
    private $redis;

    /**
     * @var string
     */
    private $primaryKey;

    /**
     * @param Redis  $redis
     * @param string $primaryKey
     */
    public function __construct(Redis $redis, string $primaryKey)
    {
        $this->redis = $redis;
        $this->primaryKey = $primaryKey;
    }

    /**
     * @param string $countryCode
     * @return void
     * @throws PersistException
     */
    public function incrementValue(string $countryCode): void
    {
        try {
            $this->redis->hIncrBy($this->primaryKey, $countryCode,1);
        }
        catch (\RedisException $e) {
            throw new PersistException($e->getMessage());
        }
    }
}