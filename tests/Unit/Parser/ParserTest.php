<?php

namespace WSC\Tests\Unit\Parser;

use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use WSC\Parser\Ast\BinaryNode;
use WSC\Parser\Ast\IntegerNode;
use WSC\Parser\Ast\BinaryOperators;
use WSC\Parser\Lexer;
use WSC\Parser\Node;
use WSC\Parser\Parser;

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
