<?php

declare(strict_types=1);

namespace DigitalCz\Example;

/**
 * Class with wrong structure ordering
 */
final class BadClassStructure
{
    public string $publicProperty;

    use SomeTrait;

    public const PUBLIC_CONSTANT = 'value';

    private static string $staticProperty = 'static';

    private const PRIVATE_CONSTANT = 42;

    private string $privateProperty;

    private function privateMethod(): void
    {
    }

    public function publicMethod(): void
    {
    }

    public function __construct(string $param)
    {
        $this->publicProperty = $param;
        $this->privateProperty = $param;
    }
}