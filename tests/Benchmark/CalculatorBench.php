<?php

namespace WSC\Tests\Benchmark;

use Generator;
use PhpBench\Attributes\BeforeMethods;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Revs;
use WSC\Calculator;

#[BeforeMethods("setUp")]
#[Iterations(10)]
#[Revs(10)]
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
        yield '1 + 1' => [
            'expr' => '+ 1 1',
        ];

        yield '1 + 1' => [
            'expr' => '+ 1 - 4 / 4 2',
        ];
    }

}
