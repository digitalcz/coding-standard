<?php

declare(strict_types=1);

namespace DigitalCz\Example;

// Bad use statement ordering - should trigger AlphabeticallySortedUses
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
use ArrayObject;

// Unused use statement - should trigger UnusedUses
use Psr\Log\LoggerInterface;

// Group use - should trigger DisallowGroupUse
use Symfony\Component\{HttpFoundation\Request, Routing\Annotation\Route};

// Use statement with backslash - should trigger UseDoesNotStartWithBackslash  
use \DateTime;

// Multiple uses per line - should trigger MultipleUsesPerLine
use stdClass, Exception;

/**
 * Test namespace rules violations
 */
final class NamespaceRulesTest
{
    public function testMethod(): Response
    {
        $obj = new ArrayObject();
        return new Response('test');
    }
}