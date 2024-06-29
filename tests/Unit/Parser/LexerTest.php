<?php

namespace WSC\Tests\Unit\Parser;

use PHPUnit\Framework\TestCase;
use WSC\Parser\Lexer;
use WSC\Parser\Token;
use WSC\Parser\TokenType;

class LexerTest extends TestCase
{
    public function testLex(): void
    {
        $tokens = (new Lexer())->lex('3 + 2 1.1 - * &');
        self::assertEquals([
            new Token(TokenType::INTEGER, '3'),
            new Token(TokenType::PLUS, '+'),
            new Token(TokenType::INTEGER, '2'),
            new Token(TokenType::FLOAT, '1.1'),
            new Token(TokenType::MINUS, '-'),
            new Token(TokenType::MULTIPLY, '*'),
            new Token(TokenType::UNKNOWN, '&'),
        ], $tokens->toArray());
    }
}
