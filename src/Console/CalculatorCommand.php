<?php

namespace WSC\Console;

use WSC\Calculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CalculatorCommand extends Command
{
    const ARG_EXPRESSION = 'expression';

    public function __construct(private Calculator $calculator)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('calculate');
        $this->setDescription('Perform a calculation using Polish notation');
        $this->addArgument(self::ARG_EXPRESSION, InputArgument::REQUIRED|InputArgument::IS_ARRAY, 'Expression to evaluate');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(sprintf(
            '<fg=cyan>The answer is:</> %d',
            $this->calculator->calculate(implode(' ', $input->getArgument(self::ARG_EXPRESSION)))
        ));
        return 0;
    }
}
