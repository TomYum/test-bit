<?php

namespace App\Tests\Converter;

use App\Converter\CountryCodeConverter;
use PHPUnit\Framework\TestCase;

class CountryCodeConverterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expectedResult
     * @return void
     */
    public function testConvert(string $input, string $expectedResult)
    {
        $converter = new CountryCodeConverter();

        $actualResult = $converter->convert($input);

        self::assertEquals($expectedResult, $actualResult);
    }

    public function dataProvider(): array
    {
        return [
            ["   ru ", "RU"],
            ["       Zh  \t", "ZH"],
            ["   \t\t\n    hH  \t", "HH"],
        ];
    }
}
