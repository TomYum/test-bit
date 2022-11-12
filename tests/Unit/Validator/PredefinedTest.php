<?php

namespace App\Tests\Validator\CountryCode;

use App\Converter\CountryCodeConverterInterface;
use App\Validator\CountryCode\Predefined;
use PHPUnit\Framework\TestCase;

class PredefinedTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function testValidate(array $predefinedCodes, string $code, bool $expected)
    {
        $validator = new Predefined($predefinedCodes, $this->createConverterMock());

        $actual = $validator->validate($code);

        self::assertEquals($expected, $actual);
    }

    public function dataProvider(): array
    {
        return [
            "in array" => [
                ["ru","it","us"],
                "ru",
                true
            ],
            "not in" => [
                ["ru","it","us"],
                "ro",
                false
            ],
            "empty list" => [
                [],
                "us",
                false
            ],
        ];
    }

    private function createConverterMock(): CountryCodeConverterInterface
    {
        $mock = $this->createMock(CountryCodeConverterInterface::class);

        $mock->method('convert')
            ->willReturnArgument(0)
            ;

        return $mock;
    }
}
