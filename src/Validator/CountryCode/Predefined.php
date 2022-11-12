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
    private $converter;

    /**
     * @param string[]                      $codes
     * @param CountryCodeConverterInterface $converter
     */
    public function __construct(array $codes, CountryCodeConverterInterface $converter)
    {
        $this->converter = $converter;
        $this->codes = $this->prepareCodes($codes);
    }

    private function prepareCodes(array $codes): array{
        return array_map(
            function (string $code): string {
                return $this->converter->convert($code);
            },
            $codes
        );
    }

    public function validate(string $code): bool
    {
        return in_array($code, $this->codes);
    }
}