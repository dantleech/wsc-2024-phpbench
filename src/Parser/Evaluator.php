<?php

namespace WSC\Parser;

use WSC\Parser\Ast\BinaryNode;
use WSC\Parser\Ast\BinaryOperators;
use WSC\Parser\Ast\FloatNode;
use WSC\Parser\Ast\IntegerNode;
use RuntimeException;


final class Evaluator
{
    public function evaluate(Node $node): float|int
    {
        if ($node instanceof BinaryNode) {
            return $this->evaluateBinaryNode($node);
        }

        if ($node instanceof IntegerNode) {
            return $node->value;
        }

        if ($node instanceof FloatNode) {
            return $node->value;
        }

        throw new RuntimeException(sprintf(
            'Do not know how to evaluate node of type: %s',
            $node::class
        ));
    }

    private function evaluateBinaryNode(BinaryNode $node): float|int
    {
        $left = $this->evaluate($node->left);
        $right = $this->evaluate($node->right);

        return match ($node->operator) {
            BinaryOperators::PLUS => $left + $right,
            BinaryOperators::MINUS => $left - $right,
            BinaryOperators::MULTIPLY => $left * $right,
            BinaryOperators::EQUALS => $left == $right,
        };
    }
}
