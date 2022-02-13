<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Category extends Entity{
    //get fields use
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'slug' => true,
        'created_at' => true,
        'modified' => true,
    ];    
}