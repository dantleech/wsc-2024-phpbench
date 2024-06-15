<?php

namespace WSC\Parser;

use WSC\Parser\Ast\BinaryNode;
use WSC\Parser\Ast\BinaryOperators;
use WSC\Parser\Ast\FloatNode;
use WSC\Parser\Ast\IntegerNode;
use WSC\Parser\Exception\SyntaxError;

final class Parser
{
    public function parse(Tokens $tokens): Node
    {
        $token = $tokens->consume();

        return $this->parseToken($tokens, $token);
    }

    private function parseToken(Tokens $tokens, Token $token): Node
    {
        return match ($token->type) {
            TokenType::PLUS => $this->parseBinaryNode($tokens, $token),
            TokenType::MINUS => $this->parseBinaryNode($tokens, $token),
            TokenType::MULTIPLY => $this->parseBinaryNode($tokens, $token),
            TokenType::DIVIDE => $this->parseBinaryNode($tokens, $token),
            TokenType::EQUALS => $this->parseBinaryNode($tokens, $token),
            TokenType::INTEGER => new IntegerNode((int)$token->value),
            TokenType::FLOAT => new FloatNode((float)$token->value),
            TokenType::UNKNOWN => throw new SyntaxError(sprintf('Unknown token with value "%s"', $token->value)),
            TokenType::END => throw new SyntaxError('Unexpected end'),
        };
    }

    private function parseBinaryNode(Tokens $tokens, Token $token): BinaryNode
    {
        $left = $this->parseToken($tokens, $tokens->consume());
        $right = $this->parseToken($tokens, $tokens->consume());

        return new BinaryNode(BinaryOperators::from($token->value), $left, $right);
    }
}
