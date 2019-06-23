<?php

namespace Calculator;


class Calculator
{
    private $input;
    private $display;

    public function __construct($display)
    {
        $this->input = "";
        $this->display = $display;
    }

    public function keyPressed($input)
    {
        $this->input .= $input;
        $this->display->showDisplay($this->input);
    }

    public function calculate()
    {
        $this->calculateInRightOrder();
        $this->display->showDisplay($this->input);
    }

    protected function calculateInRightOrder()
    {
        $parser = new Parser($this->input);
        $this->input = $parser->parse();
    }

}


