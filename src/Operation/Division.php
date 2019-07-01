<?php

namespace Calculator\Operation;


class Division extends BinaryOperation
{
    protected function selectOperation($a, $b)
    {
        return $a / $b;
    }
}
