<?php

namespace Phpbench\Wsc2024\Console;

use Phpbench\Wsc2024\Parser\Lexer;
use Phpbench\Wsc2024\Parser\Parser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CalculatorCommand extends Command
{
    public function __construct(private Lexer $lexer, private Parser $parser, private Evaluator $evaluator)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('calculate');
        $this->setDescription('Perform a calculation using Polish notation');
        $this->addArgument('expression', InputArgument::REQUIRED, 'Expression to evaluate');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(sprintf(
            'The answer is: %d',
            $this->evaluator->evaluate(
                $this->parser->parse(
                    $this->lexer->lex($input->getArgument('expression'))
                )
            )
        );
    }
}
