<?php

namespace App\Services\UpdateStatistic;

use App\Factory\ResponseFactoryInterface;
use App\Repository\Persist\Exception\PersistException;
use App\Repository\Persist\PersistRepositoryInterface;
use App\Validator\CountryCode\CountryCodeValidatorInterface;
use Symfony\Component\HttpFoundation\Response;

class Service implements ServiceInterface
{
    /**
     * @var PersistRepositoryInterface
     */
    private $repository;

    /**
     * @var CountryCodeValidatorInterface
     */
    private $validator;

    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @param PersistRepositoryInterface    $repository
     * @param CountryCodeValidatorInterface $validator
     * @param ResponseFactoryInterface      $responseFactory
     */
    public function __construct(PersistRepositoryInterface $repository, CountryCodeValidatorInterface $validator, ResponseFactoryInterface $responseFactory)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->responseFactory = $responseFactory;
    }

    public function increaseValue(string $countryCode): Response
    {
        return
        $this->validator->validate($countryCode)
            ? $this->responseFactory->createErroneousResponse("validation error")
            : $this->updateValue($countryCode);
    }

    private function updateValue(string $countryCode) {
        try {
            $this->repository->incrementValue($countryCode);
            return $this->responseFactory->createSuccessfulResponse();
        }
        catch (PersistException $e) {
            return $this->responseFactory->createExceptionalResponse("persist error");
        }
    }
}
