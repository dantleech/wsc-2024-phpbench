<?php

namespace Phpbench\Wsc2024\Tests\Unit\Parser;

use PHPUnit\Framework\TestCase;
use Phpbench\Wsc2024\Parser\Lexer;
use Phpbench\Wsc2024\Parser\Token;

class LexerTest extends TestCase
{
    public function testLex(): void
    {
        $tokens = (new Lexer())->lex('= 3 + 2 1.1 - *');
        self::assertEquals([
            new Token(Token::T_EQUALS, '='),
            new Token(Token::T_INTEGER, '3'),
            new Token(Token::T_PLUS, '+'),
            new Token(Token::T_INTEGER, '2'),
            new Token(Token::T_FLOAT, '1.1'),
            new Token(Token::T_MINUS, '-'),
            new Token(Token::T_MULTIPLY, '*'),
        ], $tokens->toArray());
    }
}
