<?php

namespace App\Services\UpdateStatistic;

use Symfony\Component\HttpFoundation\Response;

interface ServiceInterface
{
    public function increaseValue(string $countryCode): Response;
}