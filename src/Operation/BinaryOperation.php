<?php

namespace Calculator\Operation;


abstract class BinaryOperation
{
    public function useOperation($input, $matches, $operator)
    {
        foreach ($matches[0] as $match) {

            $numbers = explode($operator, $match);

            $subResult = $this->selectOperation($match, $numbers, $operator);

            $input = str_replace($match, $subResult, $input);
        }
        return $input;
    }

    abstract protected function selectOperation($match, $numbers, $operator);

}