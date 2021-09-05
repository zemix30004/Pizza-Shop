<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyConversion
{
    protected static $container;
    const UAH = 'UAH';

    public static function loadContainer()
    {
        if (is_null(self::$container)) {
            $currencies = Currency::get();
            foreach ($currencies as $currency) {
                self::$container[$currency->code] = $currency;
            }
        }
    }

    public static function getCurrencies()
    {
        return self::$container;
    }

    public static function convert($sum, $originCurrencyCode = self::UAH, $targetCurrencyCode = null)
    {
        self::loadContainer();

        $originCurrency = self::$container[$originCurrencyCode];

        if (is_null($targetCurrencyCode)) {
            $targetCurrencyCode = session('currency', self::UAH);
        }
        $targetCurrency = self::$container[$targetCurrencyCode];

        return $sum * $originCurrency->rate / $targetCurrency->rate;
    }

    public static function getCurrencySymbol()
    {
        self::loadContainer();

        $currencyFromSession = session('currency', self::UAH);

        $currency = self::$container[$currencyFromSession];
        return $currency->symbol;
    }
}
