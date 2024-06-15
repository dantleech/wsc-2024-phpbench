<?php

namespace Phpbench\Wsc2024\Parser;

final class Token
{
    public function __construct(public TokenType $type, public string $value)
    {
    }
}
