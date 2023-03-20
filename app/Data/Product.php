<?php 

namespace App\Data;

class Product {

    public function __construct(
        public string $name,
        public int $qty
    ) {}
}