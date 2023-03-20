<?php 

namespace App\Interfaces;

interface PhoneInterface {
    /**
     * Phone Name Definition
     * @param string
     * @return string
     */
    public function definition(string $name): string;
}