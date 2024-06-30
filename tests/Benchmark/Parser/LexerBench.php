<?php

namespace WSC\Tests\Benchmark;

use Generator;
use PhpBench\Attributes as Bench;
use WSC\Parser\Lexer;

#[Bench\Iterations(10)]
#[Bench\Revs(10)]
#[Bench\BeforeMethods("setUp")]
class LexerBench
{
    private Lexer $lexer;

    public function setUp(): void
    {
        $this->lexer = new Lexer();
    }

    #[Bench\ParamProviders('provideLexer')]
    public function benchLexer(array $params): void
    {
        $this->lexer->lex($params['expr']);
    }

    public function provideLexer(): Generator
    {
        yield 'one plus one' => [
            'expr' => '+ 1 1',
        ];
        yield 'longer expression' => [
            'expr' => '+ 2 2 * 2 4 / 1 + 5 * 10 10',
        ];
    }
}
