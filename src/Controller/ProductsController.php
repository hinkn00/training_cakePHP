<?php
namespace App\Controller;
class ProductsController extends AppController
{
 public function index()
 {
    $this->paginate = [
        'limit' => '3',
    ];
    $products = $this->paginate($this->Products->find('all'));
    $this->set('products', $products);
 }   
 public function add()
 {
     $product = $this->Products->newEmptyEntity();
     if($this->request->is('post')){
         $product = $this->Products->patchEntity($product, $this->request->getData());
         $product->created_at = date('Y-m-d');
         if($this->Products->save($product)){
             $this->Flash->success(__('Thêm sản phẩm thành công'));
            return $this->redirect(['action'=>'index']);
         }
        $this->Flash->error(__('Thêm sản phẩm chưa thành công. Hãy thử lại'));

     }
     $this->set(compact('product'));
 }
 public function edit($id = null)
 {
    $product = $this->Products->get($id);
    if($this->request->is(array('post','put'))){
        $product = $this->Products->patchEntity($product, $this->request->getData());
        if($this->Products->save($product)){
            $this->Flash->success(__('Sửa sản phẩm thành công'));
           return $this->redirect(['action'=>'index']);
        }
       $this->Flash->error(__('Sửa sản phẩm chưa thành công. Hãy thử lại'));
    }
    $this->set(array(
        'name'=>$product->p_name, 
        'detail'=>$product->p_detail, 
        'price'  => $product->p_price,
        'status'  => $product->p_status,
        'status'  => $product->p_status,
        'created_at'  => $product->created_at,
        'product'=>$product,
    ));
 }

 public function delete($id = null)
 {
    $this->request->allowMethod(array('post','delete'));
    $product = $this->Products->get($id);
    if($this->Products->delete($product)){
        $this->Flash->success(__('Xóa sản phẩm thành công'));
        return $this->redirect(['action'=>'index']);
    }
    else{
        $this->Flash->error(__('Xóa sản phẩm chưa thành công. Hãy thử lại'));
    }
    $this->set(array('product'=>$product));


 }
}
