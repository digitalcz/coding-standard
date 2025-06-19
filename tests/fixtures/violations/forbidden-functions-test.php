<?php

declare(strict_types=1);

function testForbiddenFunctions(): void
{
    // This should NOT trigger FoundWithAlternative since it's excluded
    eval('echo "test";');
    
    // Other forbidden functions might still trigger errors
    $result = create_function('$a', 'return $a;');
}