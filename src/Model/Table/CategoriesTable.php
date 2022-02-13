<?php

namespace App\Model\Table;

use App\Model\Table\CategoriesBaseTable;

class CategoriesTable extends CategoriesBaseTable{   

    public function getAllCategory()
    {
        $options =  array(
            'field'=> array('*'),
        );
        $tmp = $this->find('all',$options);
        return $tmp;
    }

    public function getSlugOfCategory($slug)
    {
        $name = $this->getAlias();
        $tmpData = $this->find("all", array(
            'field' => '*',
            'conditions' => array(
                'category.slug =' => $slug
            )
        ))->first();
        return $tmpData;
    }
}