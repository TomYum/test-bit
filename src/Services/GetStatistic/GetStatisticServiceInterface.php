<?php

namespace App\Services\GetStatistic;

use Symfony\Component\HttpFoundation\Response;

interface GetStatisticServiceInterface
{
    public function getStatistic(): Response;
}