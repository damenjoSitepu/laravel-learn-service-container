<?php 

namespace App\Dummy; 

use App\Dummy\Category;

class Product {
    private Category $category;
    private $name = 'Asus Rog';

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getFullInformation() 
    {
        return "{$this->category->getName()} {$this->name}";
    }
}