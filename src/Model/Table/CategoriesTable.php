<?php

namespace App\Model\Table;

use App\Model\Table\CategoriesBaseTable;

class CategoriesTable extends CategoriesBaseTable{
    public $userTable = "categories";
    public $name = "category";

    public function getAllCategory()
    {
        $options =  array(
            'field'=> array('*'),
        );
        $tmp = $this->find('all',$options);
        return $tmp;
    }
}