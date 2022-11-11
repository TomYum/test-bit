<?php

namespace App\Repository\Read;

use App\Repository\Read\Exception\NotFoundException;
use Redis;
use RedisException;

class RedisRepository implements ReadRepositoryInterface
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

    public function getStat(): array
    {
        try {
            return $this->redis->hGetAll($this->primaryKey);
        }catch (RedisException $e) {
            throw new NotFoundException("Not found", null, $e);
        }
    }
}
