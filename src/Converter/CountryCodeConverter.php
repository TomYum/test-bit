<?php

namespace App\Converter;

use App\Validator\CountryCode\CountryCodeValidatorInterface;

class CountryCodeConverter implements CountryCodeConverterInterface
{
    public function convert(string $code): string
    {
        return strtoupper(trim($code));
    }
}