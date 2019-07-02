<?php

namespace Calculator\Operation;


class Operations
{

    public function getOperations()
    {
        return [
            new Exponentiation(),
            new Division(),
            new Multiplication(),
            new Subtraction(),
            new Addition(),
        ];
    }

    public function asPattern()
    {
        $pattern = "";
        foreach ($this->getOperations() as $operation)
        {
            if (strlen($pattern) > 0)
            {
                $pattern .= "|";
            }
            $pattern .= "\\" . $operation->getOperator();
        }
        return $pattern;
    }

}
