<?php

namespace Calculator\Operation;


class Addition extends BinaryOperation
{
    protected function selectOperation($a, $b)
    {
        return $a + $b;
    }
}
