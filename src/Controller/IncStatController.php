<?php

namespace App\Controller;

use App\Services\UpdateStatistic\Service;
use App\Services\UpdateStatistic\ServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IncStatController extends AbstractController
{
    const INTERNAL_ERROR_CODE = 500;
    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $countryCode
     * @return Response
     *
     * @Route("/stat/{countryCode}", methods={"POST"})
     */
    public function incStat(string $countryCode): Response
    {
        try {
            return $this->service->increaseValue($countryCode);
        } catch (\Throwable $e) {
            return $this->json(['error' => 'internal error'], self::INTERNAL_ERROR_CODE);
        }
    }
}