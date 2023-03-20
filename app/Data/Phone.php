<?php 

namespace App\Data;

// Interfaces
use App\Interfaces\PhoneInterface;

class Phone implements PhoneInterface{
    /**
     * Phone Name Definition
     * @param string
     * @return string
     */
    public function definition(string $name): string
    {
        return "Ini {$name}";
    }
}