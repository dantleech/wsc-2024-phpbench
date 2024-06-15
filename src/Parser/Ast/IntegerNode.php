<?php

namespace WSC\Parser\Ast;

use WSC\Parser\Node;

final class IntegerNode implements Node
{
    public function __construct(public int $value)
    {
    }
}
