<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use NumberFormatter;
use Tests\TestCase;

// Services 
use App\Services\ConvertMoneyUsingCurrencyService;

class CurrencyTest extends TestCase
{
    public function test_format_currency(): void
    {
        $result = ConvertMoneyUsingCurrencyService::formatCurrency(200000,'USD');
        $this->assertEquals('$200,000.00',$result);
    }

    public function test_format_currency_with_zero_value(): void 
    {
        $result = ConvertMoneyUsingCurrencyService::formatCurrency(0,'USD');
        $this->assertEquals('0',$result);
    }

    public function test_format_currency_with_empty_string(): void 
    {
        $result = ConvertMoneyUsingCurrencyService::formatCurrency("" ?: 0,'USD');
        $this->assertEquals('0',$result);
    }

    public function test_format_currency_with_null_value(): void 
    {
        $result = ConvertMoneyUsingCurrencyService::formatCurrency(null ?: 0, 'USD');
        $this->assertEquals('0',$result);
    }

    public function test_format_currency_with_unavailable_variable(): void 
    {
        $var = isset($abc) ? $abc : 0;
        $result = ConvertMoneyUsingCurrencyService::formatCurrency($var ?: 0,'USD');
        $this->assertEquals('0',$result);
    }
}
