<?php

namespace Calculator\Operation;


class Addition extends BinaryOperation
{
    protected function selectOperation($match, $numbers, $operator)
    {
        return eval('return '.$numbers[0].$operator.$numbers[1].';');
    }

}