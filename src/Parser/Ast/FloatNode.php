<?php

namespace Phpbench\Wsc2024\Parser\Ast;

use Phpbench\Wsc2024\Parser\Node;

final class FloatNode implements Node
{
    public function __construct(public float $value)
    {
    }
}
