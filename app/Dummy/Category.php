<?php 

namespace App\Dummy;

/**
 * Category Documentation
 * 
 * @method string getName()
 */

class Category {
    private $name = 'Technology';

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