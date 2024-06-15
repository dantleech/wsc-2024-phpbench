<?php

namespace Phpbench\Wsc2024\Parser\Ast;

use Phpbench\Wsc2024\Parser\Node;

class BinaryNode implements Node
{
    public function __construct(public BinaryOperators $operator, public Node $integerNode, public Node $integerNode2)
    {
    }

}
