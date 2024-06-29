<?php

namespace WSC\Parser;

final class Token
{
    public function __construct(public TokenType $type, public string $value)
    {
    }
}
