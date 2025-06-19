<?php

declare(strict_types=1);

namespace DigitalCz\Example;

/**
 * Test array rules violations
 */
final class ArrayRulesTest
{
    public function badArrayExamples(): array
    {
        // Old array syntax - should trigger DisallowLongArraySyntax
        $oldStyle = array('item1', 'item2', 'item3');
        
        // Missing trailing comma in multi-line array - should trigger TrailingArrayComma
        $multiLine = [
            'first',
            'second',
            'third'
        ];
        
        // Partially keyed array - should trigger DisallowPartiallyKeyed
        $partiallyKeyed = [
            'key1' => 'value1',
            'value2',
            'key3' => 'value3',
        ];
        
        // Bad array bracket placement
        $badBrackets = [
            'item1',
            'item2'
            ];
        
        // Bad single line array whitespace
        $badSpacing = ['item1','item2','item3'];
        
        return [
            $oldStyle,
            $multiLine,
            $partiallyKeyed,
            $badBrackets,
            $badSpacing,
        ];
    }
}