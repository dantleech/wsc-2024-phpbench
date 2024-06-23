<?php

namespace Phpbench\Wsc2024;

use Phpbench\Wsc2024\Parser\Evaluator;
use Phpbench\Wsc2024\Parser\Lexer;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Phpbench\Wsc2024\Parser\Parser;

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
