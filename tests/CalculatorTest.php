<?php

use PHPUnit\Framework\TestCase;
use Calculator\Calculator;

class CalculatorTest extends TestCase
{
    private $calculator;

    /**
     * @test
     */
    public function shouldDisplayOnePressedKey()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);

        $this->calculator->keyPressed("1");

        //should output 1 on display
        $this->assertEquals("1", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldDisplayPressedKeys()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);

        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("2");

        $this->assertEquals("12", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOne()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);
        $this->calculator->keyPressed("1");

        $this->calculator->calculate();

        $this->assertEquals("1", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwo()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");

        $this->calculator->calculate();

        $this->assertEquals("3", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoPlusThree()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("3");

        $this->calculator->calculate();

        $this->assertEquals("6", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoMultiplyThree()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");
        $this->calculator->keyPressed("*");
        $this->calculator->keyPressed("3");

        $this->calculator->calculate();

        $this->assertEquals("7", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoMultiplyThreeMinusFour()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");
        $this->calculator->keyPressed("*");
        $this->calculator->keyPressed("3");
        $this->calculator->keyPressed("-");
        $this->calculator->keyPressed("4");

        $this->calculator->calculate();

        $this->assertEquals("3", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoMultiplyThreePlusSixDividedByTwo()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");
        $this->calculator->keyPressed("*");
        $this->calculator->keyPressed("3");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("6");
        $this->calculator->keyPressed("/");
        $this->calculator->keyPressed("2");

        $this->calculator->calculate();

        $this->assertEquals("10", $display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateLongerOperation()
    {
        $display = new SimulatorDisplay();
        $this->calculator = new Calculator($display);
        $this->calculator->keyPressed("10+4/2-1+100-10+10*2-1-1-1+5+2*2");

        $this->calculator->calculate();

        $this->assertEquals("127", $display->setNumbers);
    }

}

class SimulatorDisplay
{
    public $setNumbers;

    public function showDisplay($numbers)
    {
        $this->setNumbers = $numbers;
    }

}