<?php

namespace Phpbench\Wsc2024\Parser;

final class Tokens
{
    /**
     * @param list<Token> $tokens
     */
    public function __construct(private array $tokens)
    {
    }

    /**
     * @return list<Token>
     */
    public function toArray(): array
    {
        return $this->tokens;
    }
}
