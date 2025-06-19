<?php

declare(strict_types=1);

final class CommentedRulesTest
{
    // These should NOT trigger errors from commented-out rules
    public function singleLineMethod(): string { return 'test'; }
    
    public function methodUsingSelf(): self
    {
        return $this;
    }
    
    // But multi-line signatures should still be required
    public function multiLineMethodSignature(
        string $param1,
        int $param2,
    ): string {
        return $param1 . (string) $param2;
    }
}