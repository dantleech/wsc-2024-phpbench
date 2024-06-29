<?php

namespace WSC\Parser;

final class Lexer
{
    public function lex(string $string): Tokens
    {
        //$parts = preg_split('{\s}', $string);
        $parts = explode(' ', $string);
        $tokens = [];

        foreach ($parts as $part) {
            $tokens[] = new Token($this->resolveType($part), $part);
        }

        return new Tokens($tokens);
    }

    private function resolveType(string $part): TokenType
    {
        if (is_numeric($part)) {
            if (false === strpos($part, '.')) {
                return TokenType::INTEGER;
            }
            return TokenType::FLOAT;
        }

        return match($part) {
            '+' => TokenType::PLUS,
            '-' => TokenType::MINUS,
            '*' => TokenType::MULTIPLY,
            default => TokenType::UNKNOWN,
        };
    }
}
