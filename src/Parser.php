<?php

namespace Calculator;


use Calculator\Operation\Addition;
use Calculator\Operation\Division;
use Calculator\Operation\Multiplication;
use Calculator\Operation\Substraction;

class Parser
{
    private $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function parse()
    {
        $this->calculateSubValue("/", new Division());
        $this->calculateSubValue("*", new Multiplication());
        $this->calculateSubValue("-", new Substraction());
        $this->calculateSubValue("+", new Addition());

        return $this->input;
    }

    protected function calculateSubValue($operator, $operation)
    {
        $findingOperation = true;

        while ($findingOperation) {
            $findingOperation = preg_match_all("/(\-)?[\d]{1,}(\.)?[\d]{0,}[\\" . $operator . "][\d]{1,}(\.)?[\d]{0,}/", $this->input, $matches);

            $this->input = $operation->useOperation($this->input, $matches, $operator);
        }
    }

}