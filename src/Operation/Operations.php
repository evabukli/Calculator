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

}
