<?php

namespace WSC;

use WSC\Parser\Evaluator;
use WSC\Parser\Lexer;
use WSC\Parser\Parser;

final class Calculator
{
    private function __construct(private Lexer $lexer, private Parser $parser, private Evaluator $evaluator)
    {
    }

    public static function create(): self
    {
        return new self(new Lexer(), new Parser(), new Evaluator());
    }

    public function calculate(string $expression): int
    {
        return $this->evaluator->evaluate(
            $this->parser->parse(
                $this->lexer->lex($expression)
            )
        );
    }
}
