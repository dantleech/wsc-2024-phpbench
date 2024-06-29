<?php

namespace WSC\Parser\Ast;

use WSC\Parser\Node;

class BinaryNode implements Node
{
    public function __construct(public BinaryOperators $operator, public Node $left, public Node $right)
    {
    }

}
