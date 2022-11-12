<?php

namespace App\Converter;

use App\Validator\CountryCode\CountryCodeValidatorInterface;

class CountryCodeConvertor implements CountryCodeConverterInterface
{
    public function convert(string $code): string
    {
        return strtoupper(trim($code));
    }
}