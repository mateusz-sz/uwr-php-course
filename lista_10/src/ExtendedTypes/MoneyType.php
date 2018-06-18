<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/18/18
 * Time: 4:34 PM
 */

namespace ExtendedTypes;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Money\Money;
use Money\Currency;

class MoneyType extends Type
{
    const MONEYTYPE = 'money';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        // return the SQL used to create your column type. To create a portable column type, use the $platform.

    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $array = explode(" ", $value);
        $moneyObject = new Money($array[0], new Currency($array[1]));

        return $moneyObject;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $amount = $value->getAmount();
        $currency = $value->getCurrency();
        $result = $amount . " " . $currency;
        return $result;
    }

    public function getName()
    {
        return self::MONEYTYPE;
    }
}