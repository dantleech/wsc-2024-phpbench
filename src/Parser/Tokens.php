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

    public function consume(): Token
    {
        $token = array_shift($this->tokens);
        if (null === $token) {
            return new Token(TokenType::END, '');
        }

        return $token;
    }
}
