<?php

namespace Tests;


use PHPUnit\Framework\TestCase;
use Calculator\Calculator;

class CalculatorTest extends TestCase
{
    private $calculator;
    private $display;

    public function setUp()
    {
        $this->display = new SimulatorDisplay();
        $this->calculator = new Calculator($this->display);
    }

    /**
     * @test
     */
    public function shouldDisplayOnePressedKey()
    {
        $this->calculator->keyPressed("1");

        $this->assertEquals("1", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldDisplayPressedKeys()
    {
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("2");

        $this->assertEquals("12", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOne()
    {
        $this->calculator->keyPressed("1");

        $this->calculator->calculate();

        $this->assertEquals("1", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwo()
    {
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");

        $this->calculator->calculate();

        $this->assertEquals("3", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoPlusThree()
    {
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("3");

        $this->calculator->calculate();

        $this->assertEquals("6", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoMultiplyThree()
    {
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");
        $this->calculator->keyPressed("*");
        $this->calculator->keyPressed("3");

        $this->calculator->calculate();

        $this->assertEquals("7", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoMultiplyThreeMinusFour()
    {
        $this->calculator->keyPressed("1");
        $this->calculator->keyPressed("+");
        $this->calculator->keyPressed("2");
        $this->calculator->keyPressed("*");
        $this->calculator->keyPressed("3");
        $this->calculator->keyPressed("-");
        $this->calculator->keyPressed("4");

        $this->calculator->calculate();

        $this->assertEquals("3", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateOnePlusTwoMultiplyThreePlusSixDividedByTwo()
    {
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

        $this->assertEquals("10", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateLongerOperation()
    {
        $this->calculator->keyPressed("10+4/2-1+100-10+10*2-1-1-1+5+2*2");

        $this->calculator->calculate();

        $this->assertEquals("127", $this->display->setNumbers);
    }

    /**
     * @test
     */
    public function shouldCalculateExponentiation()
    {
        $this->calculator->keyPressed("2^8-100+2*2");

        $this->calculator->calculate();

        $this->assertEquals("160", $this->display->setNumbers);
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
