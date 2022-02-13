<?php
namespace App\Controller\Admin;
use Cake\Utility\Security;
use Cake\Event\EventInterface;
use Cake\ORM\Locator\LocatorAwareTrait;
class ProductsController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('admin');
    }
    public function index()
    {
        $this->paginate = [
            'limit' => '5',
        ];
        $products = $this->paginate($this->Products->find('all'));
        $this->set(['products'=>$products, 'title'=>'Quản lý sản phẩm']);
    }   
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if($this->request->is('post')){
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if(!$product->getErrors){         
                $image = $this->request->getData('file');
                $tmp = $image->getStream()->getMetadata('uri'); // lấy tpm_name
                $name = $image->getClientFilename();
                $ex = substr(strrchr($name,"."),1);
                $newNames = time()."_".$name;
                // exit($newNames);
                $path = "img/upload/products/".$newNames;
                $product->p_image = $newNames;
                move_uploaded_file($tmp, WWW_ROOT.$path);
            }
            $product->created_at = date('Y-m-d');
            if($this->Products->save($product)){
                $this->Flash->success(__('Thêm sản phẩm thành công'));
            return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('Thêm sản phẩm chưa thành công. Hãy thử lại'));

        }
        $this->set(['title'=>'Thêm sản phẩm', 'product'=>$product]);
    }
    public function edit($id = null)
    {
        $product = $this->Products->get($id);
        if($this->request->is(array('post','put'))){
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if(!$product->getErrors){  
                if($product->p_image){
                    unlink(WWW_ROOT."img/upload/products/".$product->p_image);
                }
                $image = $this->request->getData('file');
                $tmp = $image->getStream()->getMetadata('uri'); // lấy tpm_name
                $name = $image->getClientFilename();
                $ex = substr(strrchr($name,"."),1);
                $newNames = time()."_".$name;
                // exit($newNames);
                $path = "img/upload/products/".$newNames;
                $product->p_image = $newNames;
                move_uploaded_file($tmp, WWW_ROOT.$path);
            }
            if($this->Products->save($product)){
                $this->Flash->success(__('Sửa sản phẩm thành công'));
            return $this->redirect(['action'=>'index']);
            }
        $this->Flash->error(__('Sửa sản phẩm chưa thành công. Hãy thử lại'));
        }
        $this->set(array(
            'title'=> 'Sản phẩm: '.$product->p_name, 
            'name'=>$product->p_name, 
            'detail'=>$product->p_detail, 
            'price'  => $product->p_price,
            'image'  => $product->p_image,
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
    public function deleteSelected()
    {
        $this->request->allowMethod(array('post','delete'));
        $product = $this->request->getData('ids');
        foreach($product as $value){
            $this->Products->deleteAll(['id'=>$value]);
        }
        return $this->redirect(['action'=>'index']);
        // if($deleteAll){
        //     $this->Flash->success(__('Xóa sản phẩm thành công'));
        //     return $this->redirect(['action'=>'index']);
        // } else{
        //     $this->Flash->error(__('Xóa sản phẩm chưa thành công. Hãy thử lại'));
        // }
        // // $this->set(array('product'=>$product));
    }
    public function search()
    {
        $search = $this->request->getQuery('q');
        $this->paginate = [
            'limit' => '3',
        ];
        $products = $this->paginate($this->Products->find()->where(function($exp, $query) use($search){
            return $exp->like('p_name', '%'.$search.'%');
        }));
        $this->set(['products'=> $products, 'title'=>'Kết quả tìm kiếm: '.$search]);
    }
}


