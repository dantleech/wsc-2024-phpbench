<?php

namespace WSC\Tests\Benchmark;

use Generator;
use PhpBench\Attributes\ParamProviders;
use WSC\Parser\Lexer;
use PhpBench\Attributes as Bench;

#[Bench\Iterations(10)]
#[Bench\Revs(10)]
#[Bench\BeforeMethods('setUp')]
final class LexerBench
{
    private Lexer $lexer;

    public function setUp(): void
    {
        $this->lexer = new Lexer();
    }

    #[Bench\ParamProviders('provideLexer')]
    #[Bench\Assert('mode(variant.time.avg) < 1 microsecond +/- 10%')]
    public function benchLexer(array $params): void
    {
        $this->lexer->lex($params['expr']);
    }

    public function provideLexer(): Generator
    {
        yield 'one plus one' => [
            'expr' => '+ 1 2',
        ];
        yield 'long expression' => [
            'expr' => '+ 2 2 * 2 4 / 1 + 5 * 10 10',
        ];
    }
}
