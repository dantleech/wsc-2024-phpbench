<?php

namespace Phpbench\Wsc2024\Parser;

final class Token
{
    public const T_PLUS = 'plus';
    public const T_MINUS = 'minus';
    public const T_MULTIPLY = 'multiply';
    public const T_EQUALS = 'equals';
    public const T_INTEGER = 'integer';
    public const T_FLOAT = 'integer';
    public const T_UNKNOWN = 'unknown';

    /**
     * @param self::T_* $type
     */
    public function __construct(public string $type, public string $value)
    {
    }
}
