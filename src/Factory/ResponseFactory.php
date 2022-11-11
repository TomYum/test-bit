<?php

namespace App\Factory;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseFactory implements ResponseFactoryInterface
{

    public function createSuccessfulResponse(array $data = []): Response
    {
        return new JsonResponse($data, 200);
    }

    public function createErroneousResponse(?string $message): Response
    {
        return
            new JsonResponse(
                ['error' => $message ?? "an error occurred"],
                400
            );
    }

    public function createExceptionalResponse(?string $message): Response
    {
        return
            new JsonResponse(
                ['error' => $message ?? "internal error occurred"],
                500
            );
    }
}