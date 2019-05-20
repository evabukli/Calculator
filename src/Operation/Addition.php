<?php

namespace Calculator\Operation;

use Calculator\OperationInterface;


class Addition implements OperationInterface
{
    public function useOperation($input, $matches)
    {
        foreach ($matches[0] as $match) {
            $numbers = explode("+", $match);

            $subResult = (float)$numbers[0] + (float)$numbers[1];

            $input = str_replace($match, $subResult, $input);
        }
        return $input;
    }

}