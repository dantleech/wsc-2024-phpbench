<?php

namespace Phpbench\Wsc2024\Parser;

final class Lexer
{
    public function lex(string $string): Tokens
    {
        $parts = preg_split('{\s}', $string);
        $tokens = [];

        foreach ($parts as $part) {
            $tokens[] = new Token($this->resolveType($part), $part);
        }

        return new Tokens($tokens);
    }

    /**
     * @return Token::T_*
     */
    private function resolveType(string $part): string
    {
        if (is_numeric($part)) {
            if (false === strpos($part, '.')) {
                return Token::T_INTEGER;
            }
            return Token::T_FLOAT;
        }

        return match($part) {
            '=' => Token::T_EQUALS,
            '+' => Token::T_PLUS,
            '-' => Token::T_MINUS,
            '*' => Token::T_MULTIPLY,
            default => Token::T_UNKNOWN,
        };
    }
}
