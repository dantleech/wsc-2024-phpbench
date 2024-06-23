<?php

namespace Phpbench\Wsc2024\Parser;

use Phpbench\Wsc2024\Parser\Ast\BinaryNode;
use Phpbench\Wsc2024\Parser\Ast\BinaryOperators;
use Phpbench\Wsc2024\Parser\Ast\FloatNode;
use Phpbench\Wsc2024\Parser\Ast\IntegerNode;
use Phpbench\Wsc2024\Parser\Exception\SyntaxError;

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
