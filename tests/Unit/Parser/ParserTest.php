<?php

namespace Phpbench\Wsc2024\Tests\Unit\Parser;

use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Phpbench\Wsc2024\Parser\Ast\BinaryNode;
use Phpbench\Wsc2024\Parser\Ast\IntegerNode;
use Phpbench\Wsc2024\Parser\Ast\BinaryOperators;
use Phpbench\Wsc2024\Parser\Lexer;
use Phpbench\Wsc2024\Parser\Node;
use Phpbench\Wsc2024\Parser\Parser;

class ParserTest extends TestCase
{
    #[DataProvider('provideParse')]
    public function testParse(string $string, Node $expected): void
    {
        self::assertEquals(
            $expected,
            (new Parser())->parse((new Lexer())->lex($string))
        );
    }

    /**
     * @return Generator<array{string,Node}>
     */
    public static function provideParse(): Generator
    {
        yield [
            '+ 1 2',
            new BinaryNode(
                BinaryOperators::PLUS,
                new IntegerNode(1),
                new IntegerNode(2),
            ),
        ];
        yield [
            '+ + 1 - 2 1 1',
            new BinaryNode(
                BinaryOperators::PLUS,
                new BinaryNode(
                    BinaryOperators::PLUS,
                    new IntegerNode(1),
                    new BinaryNode(
                        BinaryOperators::MINUS,
                        new IntegerNode(2),
                        new IntegerNode(1),
                    ),
                ),
                new IntegerNode(1),
            ),
        ];
    }
}
