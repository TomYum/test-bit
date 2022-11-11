<?php

namespace App\Repository\Read;

use App\Repository\Read\Exception\NotFoundException;

interface ReadRepositoryInterface
{
    /**
     * @return array
     * @throws NotFoundException
     */
    public function getStat(): array;
}
