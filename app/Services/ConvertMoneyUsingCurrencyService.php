<?php 

namespace App\Services;

use NumberFormatter;

class ConvertMoneyUsingCurrencyService {
    /**
     * Money format base on locale country
     */
    private const LOCALE_MONEY_FORMAT = [
        'USD' => 'en-US',
        'MMK' => 'my_MM'
    ];

    /**
     * Set money formatter
     * @param float
     * @param string
     * @return mixed<float, string>
     */
    public static function formatCurrency(float $amount, string $currency): mixed 
    {
        if (empty($amount) || $amount === 0 || $amount == 0) return 0;
        // Get locale format by currency code
        $localeMoneyFormat = self::getLocaleCountryFormat($currency);
        return self::numberFormatter($localeMoneyFormat, $amount, $currency);
    }

    /**
     * Get Locale Country Format
     * @param string
     * @return string
     */
    private static function getLocaleCountryFormat(string $currency): string 
    {
        return isset(self::LOCALE_MONEY_FORMAT[$currency]) ? self::LOCALE_MONEY_FORMAT[$currency] : self::LOCALE_MONEY_FORMAT['USD'];
    }

    /**
     * Number Formatter PHP Library
     * @param string
     * @param float
     * @param string
     * @return mixed
     */
    private static function numberFormatter(string $localeFormat, float $amount, string $currency): mixed 
    {
        $numberFormatter = new NumberFormatter($localeFormat, NumberFormatter::CURRENCY);
        return $numberFormatter->formatCurrency($amount, $currency);
    }
}