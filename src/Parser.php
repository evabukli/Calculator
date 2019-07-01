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

        return $this->input;
    }

    // Split input into sequence of numbers and operators.
    private function tokeniseInput()
    {
        $numberPattern = "-?\\d+\\.?\\d*";
        $operatorPattern = $this->operations->asPattern();

        preg_match("/^$numberPattern/", $this->input, $matches);
        $this->tokens[]= $matches[0];
        $this->input = substr($this->input, strlen($matches[0]));

        while (strlen($this->input) > 0)
        {
            preg_match("/^$operatorPattern/", $this->input, $matches);
            $this->tokens[]= $matches[0];
            $this->input = substr($this->input, strlen($matches[0]));

            preg_match("/^$numberPattern/", $this->input, $matches);
            $this->tokens[]= $matches[0];
            $this->input = substr($this->input, strlen($matches[0]));
        }
    }

    protected function calculateSubValue($operation)
    {
        $findingOperation = true;

        while ($findingOperation) {
            $findingOperation = preg_match_all("/-?\d+\.?\d*[\\" . $operation->getOperator() . "]\d+\.?\d*/", $this->input, $matches);

            $this->input = $operation->useOperation($this->input, $matches);
        }
    }

}
