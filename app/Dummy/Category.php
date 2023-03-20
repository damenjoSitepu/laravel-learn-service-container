<?php 

namespace App\Dummy;

/**
 * Category Documentation
 * 
 * @method string getName()
 */

class Category {
    private $name;

    /**
     * Change name categories if they want
     * 
     * @param string
     */
    public function __construct(string $name = 'Technology')
    {
        $this->name = $name;
    }

    /**
     * Return name of product category
     * 
     * @return string
     */
    public function getName(): string  
    {
        return $this->name;
    }
}