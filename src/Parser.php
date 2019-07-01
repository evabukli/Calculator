<?php

namespace Calculator;


use Calculator\Operation\Operations;

class Parser
{
    private $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function parse()
    {
        $operations = new Operations();
        foreach ($operations->getOperations() as $operation) {
            $this->calculateSubValue($operation);
        }

        return $this->input;
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
