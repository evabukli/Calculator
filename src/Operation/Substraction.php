<?php

namespace Calculator\Operation;


class Substraction implements OperationInterface
{
    public function useOperation($input, $matches)
    {
        foreach ($matches[0] as $match) {
            $numbers = explode("-", $match);

            if (!isset($numbers[2])) {
                $subResult = (float)$numbers[0] - (float)$numbers[1];
            } else {
                $subResult = (float)-$numbers[1] - (float)$numbers[2];
            };

            $input = str_replace($match, $subResult, $input);
        }
        return $input;
    }

}