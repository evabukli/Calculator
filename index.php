<?php

require("vendor/autoload.php");

use Calculator\Calculator;
use Calculator\Display;

$display = new Display();
$calculator = new Calculator($display);

$calculator->keyPressed("10+4/2-1+100-10+10*2-1-1-1+5+2*2");
echo " = ";
$calculator->calculate();

