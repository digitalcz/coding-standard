<?php

declare(strict_types=1);

function veryComplexFunction($a, $b, $c, $d, $e, $f, $g, $h, $i, $j): string
{
    if ($a) {
        if ($b) {
            if ($c) {
                if ($d) {
                    if ($e) {
                        if ($f) {
                            if ($g) {
                                if ($h) {
                                    if ($i) {
                                        if ($j) {
                                            return 'deeply nested';
                                        }
                                        return 'level 9';
                                    }
                                    return 'level 8';
                                }
                                return 'level 7';
                            }
                            return 'level 6';
                        }
                        return 'level 5';
                    }
                    return 'level 4';
                }
                return 'level 3';
            }
            return 'level 2';
        }
        return 'level 1';
    }
    
    switch ($a) {
        case 1:
            if ($b) {
                return 'case 1b';
            }
            return 'case 1';
        case 2:
            if ($c) {
                return 'case 2c';
            }
            return 'case 2';
        case 3:
            if ($d) {
                return 'case 3d';
            }
            return 'case 3';
        default:
            if ($e) {
                return 'default e';
            }
            return 'default';
    }
}