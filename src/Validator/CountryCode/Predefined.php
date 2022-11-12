<?php

namespace App\Validator\CountryCode;

use App\Converter\CountryCodeConverterInterface;

class Predefined implements CountryCodeValidatorInterface
{
    /**
     * @var string[]
     */
    private $codes;

    /**
     * @var CountryCodeConverterInterface
     */
    private $convertor;

    /**
     * @param string[]                      $codes
     * @param CountryCodeConverterInterface $convertor
     */
    public function __construct(array $codes, CountryCodeConverterInterface $convertor)
    {
        $this->convertor = $convertor;
        $this->codes = $this->prepareCodes($codes);
    }

    private function prepareCodes(array $codes): array{
        return array_map(
            function (string $code): string {
                return $this->convertor->convert($code);
            },
            $codes
        );
    }

    public function validate(string $code): bool
    {
        return in_array($code, $this->codes);
    }
}