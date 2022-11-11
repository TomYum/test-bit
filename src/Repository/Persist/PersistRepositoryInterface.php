<?php

namespace App\Repository\Persist;

use App\Repository\Persist\Exception\PersistException;

interface PersistRepositoryInterface
{
    /**
     * @param string $countryCode
     * @return void
     * @throws PersistException
     */
    public function incrementValue(string $countryCode): void;
}