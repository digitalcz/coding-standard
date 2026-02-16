<?php

declare(strict_types=1);

namespace DigitalCz\CodingStandard\Tests\Fixtures\Violations;

// Wrong: readonly before final (should be: final readonly class)
readonly final class WrongFinalReadonlyClass
{
    public function __construct(
        public string $property,
    ) {
    }
}
