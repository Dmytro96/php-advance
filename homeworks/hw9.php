<?php

interface FormatterInterface
{
    public function format(string $string): string;
}

class RawFormatter implements FormatterInterface
{
    public function format(string $string): string
    {
        return $string;
    }
}

class DateFormatter implements FormatterInterface
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string;
    }
}

class DateDetailsFormatter implements FormatterInterface
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}


interface DeliveryInterface
{
    public function deliver(string $formattedString): void;
}

class EmailDelivery implements DeliveryInterface
{
    public function deliver(string $formattedString): void
    {
        echo "Вывод формата ({$formattedString}) по имейл";
    }
}

class SmsDelivery implements DeliveryInterface
{
    public function deliver(string $formattedString): void
    {
        echo "Вывод формата ({$formattedString}) в смс";
    }
}

class ConsoleDelivery implements DeliveryInterface
{
    public function deliver(string $formattedString): void
    {
        echo "Вывод формата ({$formattedString}) в консоль";
    }
}


class Logger
{
    public function __construct(
        private readonly FormatterInterface $formatter,
        private readonly DeliveryInterface $delivery,
    ) {
    }
    
    public function log(string $string): void
    {
        $this->deliver($this->format($string));
    }
    
    public function format(string $string): string
    {
        return $this->formatter->format($string);
    }
    
    public function deliver(string $format): void
    {
        $this->delivery->deliver($format);
    }
}

$logger = new Logger(new RawFormatter(), new SmsDelivery());
$logger->log('Emergency error! Please fix me!');
