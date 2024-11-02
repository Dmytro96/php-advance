<?php

trait Trait1
{
    public function test(): int
    {
        return 1;
    }
}

trait Trait2
{
    public function test(): int
    {
        return 2;
    }
}

trait Trait3
{
    public function test(): int
    {
        return 3;
    }
}

class Test
{
    use Trait1, Trait2, Trait3 {
        Trait1::test insteadof Trait2, Trait3;
        Trait2::test as testTrait2;
        Trait3::test as testTrait3;
    }
    
    public function getSum(): int
    {
        return $this->test() + $this->testTrait2() + $this->testTrait3();
    }
}

$test = new Test();
echo $test->getSum();
