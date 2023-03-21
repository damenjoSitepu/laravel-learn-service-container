<?php 

namespace App\Services;

/**
 * Documentation
 * 
 * @method string sayBye(string $text)
 */

class GoodbyeService {
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