<?php

declare(strict_types=1);

namespace DigitalCz\CodingStandard\Tests\Fixtures\Compliant;

// Correct: final readonly class (final before readonly)
final readonly class FinalReadonlyClass
{
    public function __construct(
        public string $property,
    ) {
    }
}
