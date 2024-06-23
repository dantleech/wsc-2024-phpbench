<?php

namespace Phpbench\Wsc2024;

use Phpbench\Wsc2024\Console\CalculatorCommand;
use Symfony\Component\Console\Application;

final class ApplicationFactory
{
    public static function createApplication(): Application
    {
        $application = new Application('polish calculator');
        $application->add(new CalculatorCommand(Calculator::create()));
        $application->setDefaultCommand('calculate', true);

        return $application;
    }

}
