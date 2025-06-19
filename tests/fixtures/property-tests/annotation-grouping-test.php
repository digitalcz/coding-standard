<?php

declare(strict_types=1);

namespace DigitalCz\Example;

use Doctrine\ORM\Mapping as ORM;
use OpenApi\Annotations as OA;

/**
 * Wrong annotation grouping order - should trigger DocCommentSpacing error
 *
 * @OA\Get(path="/test")
 * @param string $param
 * @ORM\Entity
 * @return string
 */
function badAnnotationGrouping(string $param): string
{
    return $param;
}

/**
 * Another wrong grouping example
 *
 * @throws \Exception
 * @var string
 * @ORM\Column(type="string")
 * @param string $value
 */
function anotherBadExample(string $value): string
{
    return $value;
}