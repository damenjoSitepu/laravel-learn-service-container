<?php 

namespace App\Services;

// Interfaces
use App\Interfaces\GoodbyeInterface;

/**
 * Documentation
 * 
 * @method string sayBye(string $text)
 */

class GoodbyeService implements GoodbyeInterface {
    /**
     * Say goodbye to anyone you want
     * 
     * @param string
     * @return string
     */
    public function sayBye(string $text): string
    {
        return "Goodbye {$text}";
    }
}