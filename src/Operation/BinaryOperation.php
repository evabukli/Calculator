<?php

namespace Calculator\Operation;


abstract class BinaryOperation
{
    public function useOperation($input, $matches)
    {
        foreach ($matches[0] as $match) {

            $subResult = $this->selectOperation($match);

            $input = str_replace($match, $subResult, $input);
        }
        return $input;
    }

    abstract public function selectOperation($match);

}