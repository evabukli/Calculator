<?php

namespace Calculator;


use Calculator\Operation\Operations;

class Parser
{
    private $operations;
    private $input;
    private $tokens;

    public function __construct($input)
    {
        $this->operations = new Operations();
        $this->input = $input;
        $this->tokens = [];
    }

    public function parse()
    {
        $this->tokeniseInput();
        $this->input = implode($this->tokens); // temporary

        foreach ($this->operations->getOperations() as $operation) {
            $this->calculateSubValue($operation);
        }

        //return $this->input;
        return $this->tokens[0];
    }

    // Split input into sequence of numbers and operators.
    private function tokeniseInput()
    {
        $numberPattern = "-?\\d+\\.?\\d*";
        $operatorPattern = $this->operations->asPattern();

        $this->tokenise($numberPattern);

        while (strlen($this->input) > 0)
        {
            $this->tokenise($operatorPattern);
            $this->tokenise($numberPattern);
        }
    }

    private function tokenise($pattern)
    {
        preg_match("/^$pattern/", $this->input, $matches);
        $match = $matches[0];
        $this->tokens[]= $match;
        $this->input = substr($this->input, strlen($match));
    }

    protected function calculateSubValue($operation)
    {
        $findingOperation = array_search($operation->getOperator(), $this->tokens, true);
        if ($findingOperation)
        {
            $x = array_slice($this->tokens, $findingOperation-1, 3);
            $result = $operation->selectOperation((float)$x[0], (float)$x[2]);
            $this->tokens = array_merge(
                array_slice($this->tokens, 0, $findingOperation - 1),
                [$result],
                array_slice($this->tokens, $findingOperation + 2),
            );

            $this->calculateSubValue($operation);
        }

        $findingOperation = true;

        while ($findingOperation) {
            $findingOperation = preg_match_all("/-?\d+\.?\d*[\\" . $operation->getOperator() . "]\d+\.?\d*/", $this->input, $matches);

            $this->input = $operation->useOperation($this->input, $matches);
        }
    }

}
