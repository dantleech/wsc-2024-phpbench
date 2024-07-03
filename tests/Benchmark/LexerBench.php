<?php

namespace WSC\Tests\Benchmark;

use WSC\Parser\Lexer;

final class LexerBench
{
    public function benchLexer(): void
    {
        $lexer = new Lexer();
        $lexer->lex('+ 1 2');
    }
}
