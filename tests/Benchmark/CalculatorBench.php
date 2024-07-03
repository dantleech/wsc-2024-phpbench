<?php

namespace WSC\Tests\Benchmark;

use Generator;
use PhpBench\Attributes\ParamProviders;
use WSC\Calculator;
use PhpBench\Attributes as Bench;

#[Bench\Iterations(10)]
#[Bench\Revs(10)]
#[Bench\BeforeMethods('setUp')]
class CalculatorBench
{
    private Calculator $calculator;

    public function setUp(): void
    {
        $this->calculator = Calculator::create();
    }

    #[ParamProviders('provideCalculator')]
    public function benchCalculator(array $params): void
    {
        $this->calculator->create()->calculate($params['expr']);
    }

    public function provideCalculator(): Generator
    {
        yield 'one plus one' => [
            'expr' => '+ 1 2',
        ];
        yield 'long expression' => [
            'expr' => '+ 2 2 * 2 4 / 1 + 5 * 10 10',
        ];
    }
}

