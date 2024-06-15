<?php

namespace Phpbench\Wsc2024\Tests\Unit\Parser;

use PHPUnit\Framework\TestCase;
use Phpbench\Wsc2024\Parser\Lexer;
use Phpbench\Wsc2024\Parser\Token;
use Phpbench\Wsc2024\Parser\TokenType;

class LexerTest extends TestCase
{
    public function testLex(): void
    {
        $tokens = (new Lexer())->lex('= 3 + 2 1.1 - *');
        self::assertEquals([
            new Token(TokenType::EQUALS, '='),
            new Token(TokenType::INTEGER, '3'),
            new Token(TokenType::PLUS, '+'),
            new Token(TokenType::INTEGER, '2'),
            new Token(TokenType::FLOAT, '1.1'),
            new Token(TokenType::MINUS, '-'),
            new Token(TokenType::MULTIPLY, '*'),
        ], $tokens->toArray());
    }
}
