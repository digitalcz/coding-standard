<?php

declare(strict_types=1);

namespace DigitalCz\Example;

/**
 * Test control structure rules violations
 */
final class ControlStructureRulesTest
{
    public function badControlStructures($param): string
    {
        // Yoda comparison - should trigger DisallowYodaComparison
        if (true === $param) {
            return 'yoda style bad';
        }
        
        // Long ternary when short should be used - should trigger RequireShortTernaryOperator
        $result = $param !== null ? $param : 'default';
        
        // Should use ternary operator instead of if-return
        if ($param) {
            return 'yes';
        } else {
            return 'no';
        }
        
        // Should use null coalesce operator
        $value = isset($param) ? $param : 'default';
        
        // Empty usage - should trigger DisallowEmpty
        if (empty($param)) {
            return 'empty check bad';
        }
        
        // New without parentheses - should trigger NewWithParentheses
        $obj = new \stdClass;
        
        // Language construct with parentheses - should trigger LanguageConstructWithParentheses
        echo($param);
        
        return (string) $param;
    }
}