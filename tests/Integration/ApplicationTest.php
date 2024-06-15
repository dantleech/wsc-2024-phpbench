<?php

namespace WSC\Tests\Integration;

use PHPUnit\Framework\TestCase;
use WSC\ApplicationFactory;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

final class ApplicationTest extends TestCase
{
    public function testApplication(): void
    {
        $input =  new ArrayInput(['expression' => ['+', '2 2']]);
        $output = new BufferedOutput();
        $application = ApplicationFactory::createApplication();
        $application->setAutoExit(false);
        $application->run(
            $input,
            $output,
        );
        self::assertStringContainsString('The answer is: 4', $output->fetch());
    }
}
