<?php 
require './src/Calculate.php';
use PHPUnit\Framework\TestCase;
class CalculateTest extends  TestCase{
    public function testAdd(){
        $c = new Calculate ;
        $result = $c-> Add(3,5);
        $this->assertEquals(8,$result) ;
    }
}