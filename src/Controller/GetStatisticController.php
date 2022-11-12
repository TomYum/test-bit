<?php

namespace App\Controller;

use App\Services\GetStatistic\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GetStatisticController extends AbstractController
{
    /**
     * @var Service
     */
    private $getService;

    /**
     * @param Service $getService
     */
    public function __construct(Service $getService)
    {
        $this->getService = $getService;
    }

    /**
     * @return Response
     */
    public function getStat(): Response
    {
        try {
            return $this->getService->getStatistic();
        } catch (\Throwable $e) {
            return $this->json(['error' => 'internal error'], 500);
        }
    }
}
