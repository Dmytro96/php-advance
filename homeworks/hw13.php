<?php

class Contact
{
    public function __construct(
        private string $name,
        private string $surname,
        private string $email,
        private string $phone,
        private string $address
    ) {
    }
}

class ContactBuilder
{
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $address;
    
    public function setName($name): ContactBuilder
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function setSurname($surname): ContactBuilder
    {
        $this->surname = $surname;
        
        return $this;
    }
    
    public function setEmail($email): ContactBuilder
    {
        $this->email = $email;
        
        return $this;
    }
    
    public function setPhone($phone): ContactBuilder
    {
        $this->phone = $phone;
        
        return $this;
    }
    
    public function setAddress($address): ContactBuilder
    {
        $this->address = $address;
        
        return $this;
    }
    
    public function build(): Contact
    {
        return new Contact($this->name, $this->surname, $this->email, $this->phone, $this->address);
    }
}

$builder = new ContactBuilder();
$contact = $builder
    ->setName('John')
    ->setSurname('Doe')
    ->setEmail('john.doe@example.com')
    ->setPhone('123456789')
    ->setAddress('123 Main St')
    ->build();
