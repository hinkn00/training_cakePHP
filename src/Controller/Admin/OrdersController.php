<?php
namespace App\Controller\Admin;
use Cake\Utility\Security;
use Cake\Event\EventInterface;

class OrdersController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Products');
        $this->loadModel('Orders');
        $this->loadModel('Users');
    }
    public function index()
    {
        $orders = $this->Orders->find();
        $products = $this->Products->find();
        $users = $this->Users->find();

        $this->set(['title'=>'Danh sách đặt hàng', 'orders'=>$orders, 'products'=>$products,'users'=>$users]);
    }  
    public function add()
    {
        $products = $this->Products->find();
        $users = $this->Users->find();
        $order = $this->Orders->newEmptyEntity();
        if($this->request->is('post')){
            $order->id_product = $this->request->getData('id_product');
            $order->id_user = $this->request->getData('id_user');
            $order->quantity = $this->request->getData('quantity');
            $order->o_status = 0;
            $order->create_at = date('Y-m-d');
            if($this->Orders->save($order)){
                $this->Flash->success(__('Thêm sản phẩm thành công'));
            return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('Thêm sản phẩm chưa thành công. Hãy thử lại'));
    
         }
        $this->set(['title'=>'Thêm đơn hàng mới', 'order'=>$order, 'products'=>$products,'users'=>$users]);
    }
    public function edit($id = null)
    {
        $order = $this->Orders->get($id);
        if($this->request->is(['post','put'])){
            $order->quantity = $this->request->getData('quantity');
            $order->o_status = $this->request->getData('o_status');
            if($this->Orders->save($order)){
                $this->Flash->success(__('Cập nhật thành công!'));
               return $this->redirect(['action'=>'index']);
            }
           $this->Flash->error(__('Cập nhật chưa thành công. Hãy thử lại'));
        }
        $this->set([
            'title'=>'Sửa thông tin của '.$order->u_name,
            'quantity' => $order->quantity,
            'o_status' => $order->o_status,
            'order' => $order
        ]);
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
        if($this->Orders->delete($order)){
            $this->Flash->success(__('Xóa đơn hàng thành công'));
            return $this->redirect(['action'=>'index']);
        }else{
            $this->Flash->error(__('Xóa đơn hàng chưa thành công. Hãy thử lại'));
        }
    }
}