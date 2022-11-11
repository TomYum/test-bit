<?php

namespace App\Validator\CountryCode;

class Predefined implements CountryCodeValidatorInterface
{
    /**
     * @var string[]
     */
    private $codes;

    /**
     * @param array $codes
     */
    public function __construct(array $codes = [])
    {
        $this->codes = $codes;
    }

    public function validate(string $code): bool
    {
        return in_array($code, $this->codes);
    }
}