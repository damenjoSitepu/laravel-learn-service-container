<?php 

namespace App\Dummy; 

use App\Dummy\Category;

class Product {
    /**
     * Name of product properties
     */
    private $name = 'Asus Rog';

    /**
     * Instance of all class - Property promotion
     * 
     * @param App\Dummy\Category
     */
    public function __construct(public Category $category)
    {}

    /**
     * Get full information of product also with their categories
     * 
     * @return string
     */
    public function getFullInformation(): string 
    {
        return "{$this->category->getName()} {$this->name}";
    }
}