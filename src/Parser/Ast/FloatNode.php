<?php

namespace WSC\Parser\Ast;

use WSC\Parser\Node;

final class FloatNode implements Node
{
    public function __construct(public float $value)
    {
    }
}
