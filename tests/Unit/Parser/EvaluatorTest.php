<?php

namespace Phpbench\Wsc2024\Tests\Unit\Parser;

use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Phpbench\Wsc2024\Parser\Evaluator;
use Phpbench\Wsc2024\Parser\Lexer;
use Phpbench\Wsc2024\Parser\Parser;

final class EvaluatorTest extends TestCase
{
    #[DataProvider('provideEvaluate')]
    public function testEvaluate(string $expression, int|float $expected): void
    {
        $node = (new Parser())->parse((new Lexer)->lex($expression));
        self::assertEquals($expected, (new Evaluator())->evaluate($node));
    }

    /**
     * @return Generator<string,array{string,int}>
     */
    public static function provideEvaluate(): Generator
    {
        yield 'integer addition' => [
            '+ 1 2',
            3
        ];
        yield 'float addition' => [
            '+ 1 2.2',
            3.2
        ];
        yield 'subtraction' => [
            '- 4 2',
            2,
        ];
        yield 'multiplication' => [
            '* 4 2',
            8,
        ];
    }
}
