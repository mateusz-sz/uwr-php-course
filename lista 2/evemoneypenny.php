<?php

class Money
{
  private $value;
  private $currency;

  //constructor
  public function __construct(float $value, string $currency)
  {
    $this->value = $value;
    $this->currency = $currency;
  }

  //sprawdzanie zgodnosci walut
  public function checkCurrency(Money $obj): bool
  {
    if( strcmp($this->currency, $obj->currency) != 0 )
    {
      throw new Exception("Konflikt walut!");
    }
    return true;
  }

  public function getValue()
  {
    return $this->value;
  }

  public function getCurrency()
  {
    return $this->currency;
  }

  //dodawanie
  public function add(Money $object)
  {
    if($this->checkCurrency($object))
      $this->value += $object->value;
  }

  //odejmowanie
  public function substract(Money $object)
  {
    if(checkCurrency($object)) {
      $this->value -= $object->value;
    }

  }

  //mnozenie
  public function multiply(int $mult)
  {
    $this->value *= $mult;
  }

  //dzielenie
  public function divide(int $div)
  {
    $this->this /= $div;
  }
}

interface MoneyFormater
{
  public function formatOutput(Money $obj);
}


class Formater implements MoneyFormater
{
  public function formatOutput(Money $obj): string
  {
    $formatedValue = number_format( $obj->getValue() , 2 , "," , " " );

    $output = $formatedValue . " " . $obj->getCurrency();

    return $output;
  }
}

$input = $argv;
$currency = $input[1];
$total = new Money(0, $currency);

for($i = 2; $i<$argc; $i++)
{
  $total->add(new Money($input[$i], $currency));
}

$formater = new Formater();
echo "Formated value: " . $formater->formatOutput($total) . "\n";







//
