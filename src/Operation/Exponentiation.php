<?php

namespace Calculator\Operation;


class Exponentiation extends BinaryOperation
{
    public function getOperator() {
        return "^";
    }

    public function selectOperation($a, $b)
    {
        return pow($a, $b);
    }
}
