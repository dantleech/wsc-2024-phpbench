<?php

namespace Phpbench\Wsc2024\Tests\Benchmark;

use Generator;
use PhpBench\Attributes\Assert;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Revs;
use Phpbench\Wsc2024\Parser\Lexer;

#[Iterations(5)]
#[Revs([10])]
final class LexerBench
{
    #[ParamProviders('provideLexer')]
    public function benchLexer(array $params): void
    {
        (new Lexer())->lex('+ 1 1');
    }
    /**
     * @return Generator<array{}>
     */
    public function provideLexer(): Generator
    {
        yield '1 + 1' => ['expr' => '+ 1 1'];
        yield '1 - 1 + 1' => ['expr' => '+ - 1 1 1'];
    }

}
