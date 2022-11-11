<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetStatisticController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route("/stat", methods={"GET","HEAD"})
     */
    public function getStat(): Response
    {

        return $this->json([]);
    }
}