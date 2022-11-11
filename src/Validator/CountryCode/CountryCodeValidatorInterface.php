<?php

namespace App\Validator\CountryCode;

interface CountryCodeValidatorInterface
{
    /**
     * @param string $code
     * @return bool
     */
    public function validate(string $code): bool;
}