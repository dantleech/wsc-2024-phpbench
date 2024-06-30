<?php

namespace WSC\Tests\Unit\Parser;

use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use WSC\Parser\Evaluator;
use WSC\Parser\Lexer;
use WSC\Parser\Parser;

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
        yield 'nested expressions' => [
            '* + 4 * 2 2 3',
            24,
        ];
        yield 'division' => [
            '/ 8 2',
            4,
        ];
    }
}
