<?php

namespace Calculator;


use Calculator\Operation\Addition;
use Calculator\Operation\Division;
use Calculator\Operation\Multiplication;
use Calculator\Operation\Substraction;

class Parser
{
    private $input;
    private $operation;

    function __construct($input)
    {
        $this->input = $input;
    }

    public function parse()
    {
        $division = new Division();
        $multiplication = new Multiplication();
        $substraction = new Substraction();
        $addition = new Addition();

        $this->calculateSubValue("/", $division);
        $this->calculateSubValue("*", $multiplication);
        $this->calculateSubValue("-", $substraction);
        $this->calculateSubValue("+", $addition);

        return $this->input;
    }

    private function calculateSubValue($operator, $operation)
    {
        $findingOperation = true;

        while ($findingOperation) {
            $findingOperation = preg_match_all("/(\-)?[\d]{1,}(\.)?[\d]{0,}[\\" . $operator . "][\d]{1,}(\.)?[\d]{0,}/", $this->input, $matches);

            $this->operation = $operation;
            $this->input = $this->operation->useOperation($this->input, $matches);
        }
    }

}