<?php 

namespace App\Interfaces;

/**
 * Documentation
 * 
 * @method string sayBye(string $text)
 */

interface GoodbyeInterface {
    /**
     * Say goodbye to anyone you want
     * 
     * @param string
     * @return string
     */
    public function sayBye(string $text): string;
}