<?php

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
class FilesController extends AppController{

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
        $this->paginate = [
            'limit' => '8'
        ];
        $products = $this->paginate($this->Products->find()->where(['p_status' => '1']));
        $this->set(['products'=>$products, 'title'=>'Sản phẩm hiện có']);
    }

    public function upload()
    {
        // if($this->request->is('post')){
        //     $image = $this->request->getData('file');
        //     $tmp = $image->getStream()->getMetadata('uri'); // lấy tpm_name
        //     $name = $image->getClientFilename();
        //     $ex = substr(strrchr($name,"."),1);
        //     $path = "upload/".Security::hash($name).".".$ex;
        //     $file = $this->Files->newEmptyEntity();
        //     $file->name = $name;
        //     $file->path = $path;
        //     $file->created_at = date("Y-m-d");
        //     if(move_uploaded_file($tmp, WWW_ROOT.$path)){
        //         $this->Files->save($file);
        //         return $this->redirect(['action'=>'index']);
        //     }
        // }

        // $this->set(array('title'=>'Tải ảnh'));
        $id = $this->request->getData('id');
        if($id){
            $orderTable = TableRegistry::get('Orders');
            $order = $orderTable->newEmptyEntity();
            $order->id_user = $this->Auth->User('id');
            $order->id_product = $id;
            $order->quantity = $this->request->getData('quantity');
            $order->o_status = 0;
            $order->create_at = date('Y-m-d');
            if($orderTable->save($order)){
                $this->Flash->success('Đặt hàng thành công');
                return $this->redirect(['action'=>'listOrder']);
            }
        } else{
            echo 'khong co don hang';
            exit;
        }
        
    }
    public function delete($id = null)
    {
        // $file = $this->Files->get($id);

        // $path = WWW_ROOT.$file->path;
        // if(unlink($path)){
        //     $this->Files->delete($file);
        //     return $this->redirect(['action'=>'index']);
        // }

        // $this->request->allowMethod(['post','delete']);
        $order = $this->Orders->get($id);
        $order->o_status = 3;
        if($this->Orders->save($order)){
            $this->Flash->success(__('Xóa đơn hàng thành công'));
            return $this->redirect(['action'=>'listOrder']);
        }else{
            $this->Flash->error(__('Xóa đơn hàng chưa thành công. Hãy thử lại'));
        }
    }
    public function listOrder()
    {  
        if($this->Auth->User()){
            $orders = $this->Orders->find();
            $products = $this->Products->find();
            $users = $this->Users->find();

            $this->set(['title'=>'Danh sách đặt hàng', 'orders'=>$orders, 'products'=>$products,'users'=>$users]);
        } else{
            return $this->redirect(['controller'=>'Users','action'=>'login']);
            exit;
        }
    }
    // public function download($id = null)
    // {
    //     $file = $this->Files->get($id);
    //     $path = WWW_ROOT.$file->path;

    //     $response = $this->response->withFile(
    //         $path,
    //         ['download' => true, 'name' => $file->name]
    //     );
    //     return $response;
    //     if($response){
    //         return $this->redirect(['action'=>'index']);
    //     }

    // }

}