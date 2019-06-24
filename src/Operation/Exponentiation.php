<?php


namespace Calculator\Operation;


class Exponentiation extends BinaryOperation
{
    protected function selectOperation($numbers, $operator)
    {
        return pow((float)$numbers[0], (float)$numbers[1]);
    }
}