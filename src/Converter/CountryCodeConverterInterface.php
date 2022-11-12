<?php

namespace App\Converter;

interface CountryCodeConverterInterface
{
    public function convert(string $code): string;
}