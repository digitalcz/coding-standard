<?php

declare(strict_types=1);

namespace DigitalCz\CodingStandard\Tests\Integration;

use PHPUnit\Framework\TestCase;

final class SimplifiedRulesetTest extends TestCase
{
    private string $phpcsPath;
    private string $rulesetPath;

    protected function setUp(): void
    {
        $this->phpcsPath = __DIR__ . '/../../vendor/bin/phpcs';
        $this->rulesetPath = __DIR__ . '/../../ruleset.xml';
    }

    public function testCompliantCodePassesRuleset(): void
    {
        $testFile = __DIR__ . '/../fixtures/compliant/good-example.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        
        $this->assertEquals(
            0,
            $exitCode,
            'Compliant code should pass without violations. Output: ' . implode("\n", $output)
        );
    }

    public function testViolatingCodeTriggersRules(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/basic-violations.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        
        $this->assertGreaterThan(
            0,
            $exitCode,
            'Violating code should trigger rules and return non-zero exit code'
        );
    }

    public function testLineLengthLimit180Characters(): void
    {
        $testFile = __DIR__ . '/../fixtures/property-tests/line-length-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Line length violations should be detected');
        $this->assertTrue(
            strpos($outputString, '180') !== false || strpos($outputString, 'line') !== false,
            'Should detect line length violations. Output: ' . $outputString
        );
    }

    public function testComplexityLimitsDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/property-tests/complexity-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Complexity violations should be detected');
    }

    public function testFunctionLengthLimitDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/property-tests/function-length-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Function length violations should be detected');
    }

    public function testAnnotationGroupingDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/property-tests/annotation-grouping-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Annotation grouping violations should be detected');
        $this->assertTrue(
            strpos($outputString, 'DocCommentSpacing') !== false || 
            strpos($outputString, 'annotation') !== false ||
            strpos($outputString, 'spacing') !== false,
            'Should detect DocComment spacing/grouping violations. Output: ' . $outputString
        );
    }

    public function testClassStructureOrderingDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/property-tests/class-structure-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Class structure violations should be detected');
        $this->assertTrue(
            strpos($outputString, 'ClassStructure') !== false || 
            strpos($outputString, 'class') !== false ||
            strpos($outputString, 'structure') !== false ||
            strpos($outputString, 'order') !== false,
            'Should detect class structure ordering violations. Output: ' . $outputString
        );
    }

    public function testRuleExclusionsWork(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/type-hint-exclusions-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        // Should have some violations but NOT the excluded MissingNativeTypeHint errors
        $this->assertGreaterThan(0, $exitCode, 'File should have some violations');
        $this->assertStringNotContainsString(
            'MissingNativeTypeHint',
            $outputString,
            'MissingNativeTypeHint should be excluded. Output: ' . $outputString
        );
    }

    public function testForbiddenFunctionsExclusionWorks(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/forbidden-functions-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        // Should have violations but NOT FoundWithAlternative since it's excluded
        $this->assertStringNotContainsString(
            'FoundWithAlternative',
            $outputString,
            'FoundWithAlternative should be excluded. Output: ' . $outputString
        );
    }

    public function testCommentedRulesAreInactive(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/commented-rules-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        // Commented out rules should not trigger violations
        $this->assertStringNotContainsString(
            'RequireSingleLineMethodSignature',
            $outputString,
            'RequireSingleLineMethodSignature should be commented out. Output: ' . $outputString
        );
        $this->assertStringNotContainsString(
            'RequireSelfReference',
            $outputString,
            'RequireSelfReference should be commented out. Output: ' . $outputString
        );
    }

    public function testArrayRulesDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/array-rules-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Array rule violations should be detected');
        $this->assertTrue(
            strpos($outputString, 'Array') !== false || 
            strpos($outputString, 'array') !== false ||
            strpos($outputString, 'TrailingArrayComma') !== false ||
            strpos($outputString, 'DisallowLongArraySyntax') !== false,
            'Should detect array rule violations. Output: ' . $outputString
        );
    }

    public function testNamespaceRulesDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/namespace-rules-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Namespace rule violations should be detected');
        $this->assertTrue(
            strpos($outputString, 'use') !== false || 
            strpos($outputString, 'Use') !== false ||
            strpos($outputString, 'UnusedUses') !== false ||
            strpos($outputString, 'AlphabeticallySortedUses') !== false,
            'Should detect namespace/use statement violations. Output: ' . $outputString
        );
    }

    public function testControlStructureRulesDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/control-structure-rules-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Control structure rule violations should be detected');
        $this->assertTrue(
            strpos($outputString, 'Yoda') !== false || 
            strpos($outputString, 'ternary') !== false ||
            strpos($outputString, 'empty') !== false ||
            strpos($outputString, 'operator') !== false,
            'Should detect control structure violations. Output: ' . $outputString
        );
    }

    public function testVariableRulesDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/violations/variable-rules-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Variable rule violations should be detected');
        $this->assertTrue(
            strpos($outputString, 'Variable') !== false || 
            strpos($outputString, 'variable') !== false ||
            strpos($outputString, 'unused') !== false ||
            strpos($outputString, 'Unused') !== false,
            'Should detect variable rule violations. Output: ' . $outputString
        );
    }

    public function testEdgeCasesDetected(): void
    {
        $testFile = __DIR__ . '/../fixtures/property-tests/edge-cases-test.php';
        $this->assertFileExists($testFile);
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($testFile)
        );
        
        exec($command, $output, $exitCode);
        $outputString = implode("\n", $output);
        
        $this->assertGreaterThan(0, $exitCode, 'Edge case violations should be detected');
        
        // Should detect the 181-character line violation
        $this->assertTrue(
            strpos($outputString, 'line') !== false,
            'Should detect line length edge case. Output: ' . $outputString
        );
    }

    /**
     * Test that valid code with good practices passes
     */
    public function testModernPhpFeaturesPass(): void
    {
        $goodModernCode = <<<'PHP'
<?php

declare(strict_types=1);

namespace DigitalCz\Example;

use DateTime;

final class ModernPhpExample
{
    public function __construct(
        private readonly string $value,
        private readonly ?DateTime $optional = null,
    ) {
    }

    public function processValue(): string
    {
        return match ($this->value) {
            'test' => 'result',
            default => $this->value,
        };
    }

    public function useNullCoalesceOperator(): string
    {
        return $this->optional?->format('Y-m-d') ?? 'default';
    }

    /**
     * @return array<string>
     */
    public function useArrowFunction(): array
    {
        $items = ['a', 'b', 'c'];

        return array_map(static fn ($item) => strtoupper($item), $items);
    }
}
PHP;

        $tempFile = tempnam(sys_get_temp_dir(), 'modern_php_test') . '.php';
        file_put_contents($tempFile, $goodModernCode . "\n");
        
        $command = sprintf(
            '%s --standard=%s %s',
            escapeshellarg($this->phpcsPath),
            escapeshellarg($this->rulesetPath),
            escapeshellarg($tempFile)
        );
        
        exec($command, $output, $exitCode);
        
        unlink($tempFile);
        
        $this->assertEquals(
            0,
            $exitCode,
            'Modern PHP features should pass without violations. Output: ' . implode("\n", $output)
        );
    }
}