<?php



interface Taxi
{
    public function getModel();
    public function getPrice();
}

class EconomyTaxi implements Taxi
{
    public function getModel()
    {
        return 'Renault Logan';
    }
    
    public function getPrice()
    {
        return 100;
    }
}

class StandardTaxi implements Taxi
{
    public function getModel()
    {
        return 'Toyota Camry';
    }
    
    public function getPrice()
    {
        return 200;
    }
}

class LuxuryTaxi implements Taxi
{
    public function getModel()
    {
        return 'Mercedes S-Class';
    }
    
    public function getPrice()
    {
        return 300;
    }
}

abstract class TaxiDeliveryFactory
{
    abstract public function createTaxi(): Taxi;
}

class EconomyTaxiDelivery extends TaxiDeliveryFactory
{
    public function createTaxi(): Taxi
    {
        return new EconomyTaxi();
    }
}

class StandardTaxiDelivery extends TaxiDeliveryFactory
{
    public function createTaxi(): Taxi
    {
        return new StandardTaxi();
    }
}

class LuxuryTaxiDelivery extends TaxiDeliveryFactory
{
    public function createTaxi(): Taxi
    {
        return new LuxuryTaxi();
    }
}


function clientCode(TaxiDeliveryFactory $factory)
{
    $taxi = $factory->createTaxi();
    echo 'Model: ' . $taxi->getModel() . PHP_EOL;
    echo 'Price: ' . $taxi->getPrice() . PHP_EOL;
}

clientCode(new EconomyTaxiDelivery());
clientCode(new StandardTaxiDelivery());
clientCode(new LuxuryTaxiDelivery());

// або альтернативний варіант

class TaxiFactory
{
    public function createTaxi(string $taxiClass): Taxi
    {
        if (!class_exists($taxiClass)) {
            throw new Exception("Invalid taxi class");
        }
        
        $taxi = new $taxiClass();
        if (!$taxi instanceof Taxi) {
            throw new Exception("Invalid taxi type");
        }

        return $taxi;
    }
}

function newClientCode(TaxiFactory $factory, string $taxiClass): void
{
    $taxi = $factory->createTaxi($taxiClass);
    echo 'Model: ' . $taxi->getModel() . PHP_EOL;
    echo 'Price: ' . $taxi->getPrice() . PHP_EOL;
}

$factory = new TaxiFactory();
newClientCode(new TaxiFactory(), EconomyTaxi::class);
newClientCode(new TaxiFactory(), StandardTaxi::class);
newClientCode(new TaxiFactory(), LuxuryTaxi::class);
