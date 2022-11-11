<?php

namespace App\Factory;

use Symfony\Component\HttpFoundation\Response;

interface ResponseFactoryInterface
{
    public function createSuccessfulResponse(array $data = []) : Response;

    public function createErroneousResponse(?string $message) : Response;

    public function createExceptionalResponse(?string $message) : Response;
}