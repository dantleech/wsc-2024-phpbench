<?php

namespace WSC\Parser;

enum TokenType: string
{
    case PLUS = 'plus';
    case DIVIDE = 'divide';
    case MINUS = 'minus';
    case MULTIPLY = 'multiply';
    case EQUALS = 'equals';
    case INTEGER = 'integer';
    case FLOAT = 'float';
    case UNKNOWN = 'unknown';
    case END = 'end';
}
