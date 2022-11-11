<?php

namespace App\Services\GetStatistic;

use App\Factory\ResponseFactoryInterface;
use App\Repository\Read\Exception\NotFoundException;
use App\Repository\Read\ReadRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class Service implements GetStatisticServiceInterface
{
    /**
     * @var ReadRepositoryInterface
     */
    private $repository;

    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @param ReadRepositoryInterface  $repository
     * @param ResponseFactoryInterface $responseFactory
     */
    public function __construct(ReadRepositoryInterface $repository, ResponseFactoryInterface $responseFactory)
    {
        $this->repository = $repository;
        $this->responseFactory = $responseFactory;
    }

    public function getStatistic(): Response
    {
        try {
            $data = $this->repository->getStat();

            return  $this->responseFactory->createSuccessfulResponse($data);
        }catch (NotFoundException $e) {
            return $this->responseFactory->createErroneousResponse(null);
        }
    }

}