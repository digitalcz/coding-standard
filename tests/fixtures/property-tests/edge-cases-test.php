<?php

declare(strict_types=1);

namespace DigitalCz\Example;

/**
 * Edge case tests for various limits and boundaries
 */
final class EdgeCasesTest
{
    // Line exactly 180 characters (should pass)
    private string $exactly180Chars = 'This line is exactly one hundred and eighty characters long and should be right at the limit so it passes without violation issues';

    // Line 181 characters (should fail)  
    private string $over180Chars = 'This line is exactly one hundred and eighty one characters long and should be over the limit so it triggers a line length violation error';

    /**
     * Function with exactly 100 lines (should be at the limit)
     */
    public function exactly100LineFunction(): array
    {
        $data = [];
        $data[] = 'line 5';
        $data[] = 'line 6';
        $data[] = 'line 7';
        $data[] = 'line 8';
        $data[] = 'line 9';
        $data[] = 'line 10';
        $data[] = 'line 11';
        $data[] = 'line 12';
        $data[] = 'line 13';
        $data[] = 'line 14';
        $data[] = 'line 15';
        $data[] = 'line 16';
        $data[] = 'line 17';
        $data[] = 'line 18';
        $data[] = 'line 19';
        $data[] = 'line 20';
        $data[] = 'line 21';
        $data[] = 'line 22';
        $data[] = 'line 23';
        $data[] = 'line 24';
        $data[] = 'line 25';
        $data[] = 'line 26';
        $data[] = 'line 27';
        $data[] = 'line 28';
        $data[] = 'line 29';
        $data[] = 'line 30';
        $data[] = 'line 31';
        $data[] = 'line 32';
        $data[] = 'line 33';
        $data[] = 'line 34';
        $data[] = 'line 35';
        $data[] = 'line 36';
        $data[] = 'line 37';
        $data[] = 'line 38';
        $data[] = 'line 39';
        $data[] = 'line 40';
        $data[] = 'line 41';
        $data[] = 'line 42';
        $data[] = 'line 43';
        $data[] = 'line 44';
        $data[] = 'line 45';
        $data[] = 'line 46';
        $data[] = 'line 47';
        $data[] = 'line 48';
        $data[] = 'line 49';
        $data[] = 'line 50';
        $data[] = 'line 51';
        $data[] = 'line 52';
        $data[] = 'line 53';
        $data[] = 'line 54';
        $data[] = 'line 55';
        $data[] = 'line 56';
        $data[] = 'line 57';
        $data[] = 'line 58';
        $data[] = 'line 59';
        $data[] = 'line 60';
        $data[] = 'line 61';
        $data[] = 'line 62';
        $data[] = 'line 63';
        $data[] = 'line 64';
        $data[] = 'line 65';
        $data[] = 'line 66';
        $data[] = 'line 67';
        $data[] = 'line 68';
        $data[] = 'line 69';
        $data[] = 'line 70';
        $data[] = 'line 71';
        $data[] = 'line 72';
        $data[] = 'line 73';
        $data[] = 'line 74';
        $data[] = 'line 75';
        $data[] = 'line 76';
        $data[] = 'line 77';
        $data[] = 'line 78';
        $data[] = 'line 79';
        $data[] = 'line 80';
        $data[] = 'line 81';
        $data[] = 'line 82';
        $data[] = 'line 83';
        $data[] = 'line 84';
        $data[] = 'line 85';
        $data[] = 'line 86';
        $data[] = 'line 87';
        $data[] = 'line 88';
        $data[] = 'line 89';
        $data[] = 'line 90';
        $data[] = 'line 91';
        $data[] = 'line 92';
        $data[] = 'line 93';
        $data[] = 'line 94';
        $data[] = 'line 95';
        $data[] = 'line 96';
        $data[] = 'line 97';
        $data[] = 'line 98';
        $data[] = 'line 99';
        return $data;
    }

    /**
     * Test complexity at edge of limit (around 25)
     */
    public function complexityAtLimit($a, $b, $c, $d, $e): string
    {
        if ($a > 0) {
            if ($b > 0) {
                if ($c > 0) {
                    if ($d > 0) {
                        if ($e > 0) {
                            switch ($a) {
                                case 1:
                                    if ($b === 1) {
                                        return 'case 1b1';
                                    }
                                    return 'case 1';
                                case 2:
                                    if ($c === 2) {
                                        return 'case 2c2';
                                    }
                                    return 'case 2';
                                case 3:
                                    if ($d === 3) {
                                        return 'case 3d3';
                                    }
                                    return 'case 3';
                                default:
                                    if ($e === 0) {
                                        return 'default e0';
                                    }
                                    return 'default';
                            }
                        }
                        return 'e0';
                    }
                    return 'd0';
                }
                return 'c0';
            }
            return 'b0';
        }
        return 'a0';
    }
}