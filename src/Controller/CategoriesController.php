<?php

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
class CategoriesController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Products');
        $this->loadModel('Orders');
        $this->loadModel('Users');
        $this->loadModel('Categories');
        $categories = $this->Categories->getAllCategory();
        $this->set(compact('categories'));
        $this->viewBuilder()->setLayout('client');
    }
    public function index()
    {
        $slug =  $this->request->getParam('slug');
        $find_category_slug = $this->Categories->getSlugOfCategory($slug);
        $products = $this->paginate($this->Products->find('all', array(
            'conditions' => array(
                "products.category_id =" => $find_category_slug['id']
            )
        )),array('limit' => 6));
        $this->set(compact('products'));
        $this->set(array(
            'title'=>'Sản phẩm của '.$find_category_slug['name'],
            'find_category' => $find_category_slug
        ));
    }
}