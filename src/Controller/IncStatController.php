<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IncStatController extends AbstractController
{
    /**
     * @param string $countryCode
     * @return Response
     *
     * @Route("/stat/{country_code}", methods={"POST"})
     */
    public function incStat(string $countryCode): Response
    {
        return $this->json(['status' => 'ok']);
    }
}