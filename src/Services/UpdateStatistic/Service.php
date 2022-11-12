<?php

namespace App\Services\UpdateStatistic;

use App\Converter\CountryCodeConverterInterface;
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
     * @var CountryCodeConverterInterface
     */
    private $converter;

    /**
     * @param PersistRepositoryInterface    $repository
     * @param CountryCodeValidatorInterface $validator
     * @param ResponseFactoryInterface      $responseFactory
     * @param CountryCodeConverterInterface $converter
     */
    public function __construct(PersistRepositoryInterface $repository, CountryCodeValidatorInterface $validator, ResponseFactoryInterface $responseFactory, CountryCodeConverterInterface $converter)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->responseFactory = $responseFactory;
        $this->converter = $converter;
    }

    public function increaseValue(string $countryCode): Response
    {
        return
            !$this->validator->validate($this->converter->convert($countryCode))
                ? $this->responseFactory->createErroneousResponse("validation error")
                : $this->updateValue($countryCode);
    }

    private function updateValue(string $countryCode)
    {
        try {
            $this->repository->incrementValue(
                $this->converter->convert($countryCode)
            );
            return $this->responseFactory->createSuccessfulResponse();
        } catch (PersistException $e) {
            return $this->responseFactory->createExceptionalResponse("persist error");
        }
    }
}
