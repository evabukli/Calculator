<?php

namespace Calculator\Operation;


class Exponentiation extends BinaryOperation
{
    protected function selectOperation($a, $b)
    {
        return pow($a, $b);
    }
}
