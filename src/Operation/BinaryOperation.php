<?php

namespace Calculator\Operation;


abstract class BinaryOperation
{
    public function useOperation($tokens, $findingOperation)
    {
        $before = array_slice($tokens, 0, $findingOperation - 1);
        $numbers = array_slice($tokens, $findingOperation - 1, 3);
        $after = array_slice($tokens, $findingOperation -1 + 3);

        $a = (float)$numbers[0];
        $b = (float)$numbers[2];

        $subResult = $this->selectOperation($a, $b);

        return array_merge($before, [$subResult], $after);
    }

    abstract public function getOperator();

    abstract protected function selectOperation($a, $b);

}
