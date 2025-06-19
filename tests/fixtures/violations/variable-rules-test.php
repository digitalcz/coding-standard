<?php

declare(strict_types=1);

namespace DigitalCz\Example;

/**
 * Test variable rules violations
 */
final class VariableRulesTest
{
    public function badVariableUsage(): string
    {
        // Unused variable - should trigger UnusedVariable
        $unusedVariable = 'never used';
        
        // Useless variable - should trigger UselessVariable
        $temp = 'some value';
        $result = $temp;
        
        // Duplicate assignment - should trigger DuplicateAssignmentToVariable
        $value = 'first';
        $value = 'second';
        
        // Variable variable - should trigger DisallowVariableVariable
        $varName = 'result';
        $$varName = 'bad practice';
        
        // Super global usage - should trigger DisallowSuperGlobalVariable
        $data = $_POST['data'] ?? '';
        
        return $result . $data;
    }
}