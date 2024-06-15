<?php

namespace Phpbench\Wsc2024\Parser;

enum TokenType: string
{
    case PLUS = 'plus';
    case MINUS = 'minus';
    case MULTIPLY = 'multiply';
    case EQUALS = 'equals';
    case INTEGER = 'integer';
    case FLOAT = 'float';
    case UNKNOWN = 'unknown';
    case END = 'end';
}
