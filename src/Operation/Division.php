<?php

namespace Calculator\Operation;


class Division extends BinaryOperation
{
    public function getOperator() {
        return "/";
    }

    public function selectOperation($a, $b)
    {
        return $a / $b;
    }
}
