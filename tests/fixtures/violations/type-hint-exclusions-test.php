<?php

declare(strict_types=1);

// These should NOT trigger MissingNativeTypeHint errors since they're excluded
function functionWithoutParameterTypeHint($param) {
    return $param;
}

function functionWithoutReturnTypeHint(string $param) {
    return $param;
}

// But other type hint issues should still be caught
function mixedTypeHints($stringParam, int $intParam): string {
    return (string) $intParam;
}