<?php

namespace Calculator\Operation;


class Addition extends BinaryOperation
{
    protected function selectOperation($numbers, $operator)
    {
        return eval('return '.(float)$numbers[0].$operator.$numbers[1].';');
    }
}
