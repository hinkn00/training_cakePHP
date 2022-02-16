<?php
// declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\Category;
class CategoriesBaseTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('categories');
        $this->setAlias('category');
        // $this->setEntityClass('App\Model\Entity\Category');
        $this->setPrimaryKey('id');
        $this->hasMany('Products')->setForeignKey('category_id');
    }
}
