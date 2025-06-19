<?php

declare(strict_types=1);

namespace DigitalCz\Example;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use OpenApi\Annotations as OA;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Example class that follows all rules
 *
 * @ORM\Entity
 * @Gedmo\SoftDeleteable
 *
 * @OA\Tag(name="example")
 * @OA\Get(path="/example")
 * @OA\Response(response="200", description="Success")
 * @Groups({"api"})
 */
final class GoodExample
{
    use SomeTrait;

    public const EXAMPLE_CONSTANT = 'value';

    private const PRIVATE_CONSTANT = 42;

    private static string $staticProperty = 'static';

    public string $publicProperty;

    private string $privateProperty;

    public function __construct(
        string $param,
        int $anotherParam,
    ) {
        $this->publicProperty = $param;
        $this->privateProperty = (string) $anotherParam;
    }

    public function publicMethod(): string
    {
        return $this->privateProperty;
    }

    /**
     * @param array<mixed> $data
     */
    private function privateMethod(array $data): bool
    {
        return count($data) > 0;
    }
}
