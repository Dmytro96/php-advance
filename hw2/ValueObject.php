<?php

class ValueObject
{
    public function __construct(
        private $red,
        private $green,
        private $blue,
    ) {
    }
    
    public function getRed()
    {
        return $this->red;
    }
    
    public function setRed($red)
    {
        $this->validateColor($red);
        $this->red = $red;
    }
    
    public function getGreen()
    {
        return $this->green;
    }
    
    public function setGreen($green)
    {
        $this->validateColor($green);
        $this->green = $green;
    }
    
    public function getBlue()
    {
        return $this->blue;
    }
    
    public function setBlue($blue)
    {
        $this->validateColor($blue);
        $this->blue = $blue;
    }
    
    public function equals(ValueObject $valueObject): bool
    {
        return (
            $this->red === $valueObject->getRed()
            && $this->green === $valueObject->getGreen()
            && $this->blue === $valueObject->getBlue()
        );
    }
    
    public function mix(ValueObject $valueObject): ValueObject
    {
        return new ValueObject(
            ($this->red + $valueObject->getRed()) / 2,
            ($this->green + $valueObject->getGreen()) / 2,
            ($this->blue + $valueObject->getBlue()) / 2,
        );
    }
    
    private function checkValidColor(int $color): bool
    {
        return $color >= 0 && $color <= 255;
    }
    
    private function validateColor(int $color): void
    {
        if (!$this->checkValidColor($color)) {
            throw new InvalidArgumentException('Invalid color value');
        }
    }
}

