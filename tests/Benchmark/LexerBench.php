<?php

namespace Phpbench\Wsc2024\Tests\Benchmark;

use Phpbench\Wsc2024\Parser\Lexer;

class LexerBench
{
    public function benchLexer(): void
    {
        $lexer = new Lexer();
    }

}
