<?php
/**
 * This file is part of the Money library
 *
 * Copyright (c) 2011-2014 Mathias Verraes
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Money\Tests;

use InvalidArgumentException;
use Money\RoundingMode;
use PHPUnit_Framework_TestCase;
use Money\Money;
use Money\Currency;
use Money\CurrencyPair;

class CurrencyPairTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function ConvertsEurToUsdAndBack()
    {
        $eur = Money::EUR(100);

        $pair = new CurrencyPair(new Currency('EUR'), new Currency('USD'), 1.2500);
        $usd = $pair->convert($eur);
        $this->assertEquals(Money::USD(125), $usd);

        $pair = new CurrencyPair(new Currency('USD'), new Currency('EUR'), 0.8000);
        $eur = $pair->convert($usd);
        $this->assertEquals(Money::EUR(100), $eur);
    }
    
    /** @test */
    public function ConvertsEurToUsdWithModes()
    {
        $eur = Money::EUR(10);

        $pair = new CurrencyPair(new Currency('EUR'), new Currency('USD'), 1.2500);
        $usd = $pair->convert($eur);
        $this->assertEquals(Money::USD(13), $usd);

        $pair = new CurrencyPair(new Currency('EUR'), new Currency('USD'), 1.2500);
        $usd = $pair->convert($eur, new RoundingMode(RoundingMode::ROUND_HALF_DOWN));
        $this->assertEquals(Money::USD(12), $usd);
    }

    /** @test */
    public function ParsesIso()
    {
        $pair = CurrencyPair::createFromIso('EUR/USD 1.2500');
        $expected = new CurrencyPair(new Currency('EUR'), new Currency('USD'), 1.2500);
        $this->assertEquals($expected, $pair);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Can't create currency pair from ISO string '1.2500', format of string is invalid
     */
    public function ParsesIsoWithException()
    {
        CurrencyPair::createFromIso('1.2500');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Ratio must be numeric
     * @dataProvider provideNonNumericRatio
     */
    public function testConstructorWithNonNumericRatio($nonNumericRatio)
    {
        new CurrencyPair(new Currency('EUR'), new Currency('USD'), $nonNumericRatio);
    }

    public function testGetRatio()
    {
        $ratio = 1.2500;
        $pair  = new CurrencyPair(new Currency('EUR'), new Currency('USD'), $ratio);

        $this->assertEquals($ratio, $pair->getRatio());
    }

    public function testGetBaseCurrency()
    {
        $pair = new CurrencyPair(new Currency('EUR'), new Currency('USD'), 1.2500);

        $this->assertEquals(new Currency('EUR'), $pair->getBaseCurrency());
    }

    public function testGetCounterCurrency()
    {
        $pair = new CurrencyPair(new Currency('EUR'), new Currency('USD'), 1.2500);

        $this->assertEquals(new Currency('USD'), $pair->getCounterCurrency());
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The Money has the wrong currency
     */
    public function testConvertWithInvalidCurrency()
    {
        $money = new Money(100, new Currency('JPY'));
        $pair = new CurrencyPair(new Currency('EUR'), new Currency('USD'), 1.2500);

        $pair->convert($money);
    }
    
    /**
     * @dataProvider provideEqualityComparisonPairs
     */
    public function testEqualityComparisons(CurrencyPair $pair1, CurrencyPair $pair2, $equal)
    {
        $this->assertSame($equal, $pair1->equals($pair2));
    }
    
    public function provideEqualityComparisonPairs()
    {
        $usd = new Currency('USD');
        $eur = new Currency('EUR');
        $gbp = new Currency('GBP');
        
        return array(
            'Base Mismatch EUR != GBP' => array(
                new CurrencyPair($eur, $usd, 1.2500),
                new CurrencyPair($gbp, $usd, 1.2500),
                false
            ),
            'Counter Mismatch USD != GBP' => array(
                new CurrencyPair($eur, $usd, 1.2500),
                new CurrencyPair($eur, $gbp, 1.2500),
                false
            ),
            'Ratio Mismatch 1.2500 != 1.5000' => array(
                new CurrencyPair($eur, $usd, 1.2500),
                new CurrencyPair($eur, $usd, 1.5000),
                false
            ),
            'Full Equality EUR/USD 1.2500' => array(
                new CurrencyPair($eur, $usd, 1.2500),
                new CurrencyPair($eur, $usd, 1.2500),
                true
            ),
        );
    }

    public function provideNonNumericRatio()
    {
        return array(
            array('NonNumericRatio'),
            array('16AlsoIncorrect'),
            array('10.00ThisIsToo')
        );
    }
}
