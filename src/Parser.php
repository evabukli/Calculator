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

        foreach ($this->operations->getOperations() as $operation) {
            $this->calculateSubValue($operation);
        }

        return $this->tokens[0];
    }

    // Split $input into sequence of $tokens i.e. numbers and operators.
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
            $this->tokens = $operation->useOperation($this->tokens, $findingOperation);

            $this->calculateSubValue($operation);
        }
    }

}
