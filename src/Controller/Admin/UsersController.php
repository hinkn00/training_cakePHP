<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Mailer\Mailer;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\TransportFactory;
//Creating API Keys for Basic Authentication
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
class UsersController extends AppController{
    public function login()
    {
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                if(empty($user['verified'])){
                    $this->Flash->error('Tài khoản bạn chưa được kích hoạt.');
                    $this->Flash->error('Vui lòng kiểm tra lại email để kích hoạt.');
                    return $this->redirect(['action'=>'login']);
                } else{
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else{
                $this->Flash->error('Email hoặc mật khẩu không chính xác');
            }
        }

        $this->set(['title'=>'Đăng nhập']);
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function add()
    {
        if($this->request->is('post')){
            $userTable = TableRegistry::get('Users');// connect table users

            $user = $userTable->newEmptyEntity();

            $hasher = new DefaultPassWordHasher();
            $yName = $this->request->getData('name');
            $yEmail = $this->request->getData('email');
            $yPassword = $this->request->getData('password');//convert sang hash bcrypt
            $yToken = Security::hash(Security::randomBytes(32));

            $user->u_name = $yName;
            $user->u_email = $yEmail;
            $user->u_password = $hasher->hash($yPassword);
            $user->u_token = $yToken;
            $user->created_at = date("Y-m-d");
            $user->updated_at = date("Y-m-d");

            if($userTable->save($user)){
                $this->Flash->success('Đăng ký thành công.');
                $this->Flash->success('Vui lòng kiểm tra hòm thư để kích hoạt tài khoản.');

                TransportFactory::setConfig('mailtrap', [
                    'host' => 'smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => 'd914e017da3afe',
                    'password' => '1b4570676e5f28',
                    'className' => 'Smtp'
                ]);

                $mailer = new Mailer();
                $mailer->setTransport('mailtrap');
                $mailer->setEmailFormat('html')
                        ->setSender('tungnt@mail.com','adminTung')
                        ->setSubject('Kích hoạt tài khoản')
                        ->setTo($yEmail)
                        ->deliver('Xin chào '.$yName.'<br/> Vui lòng xác nhận tài khoản <a href="http://localhost:8765/users/verification/'.$yToken.'">tại đây</a><br/> Xin cảm đã sử dụng trang web của chúng tôi!');
            } else{
                $this->Flash->error('Đăng ký không thành công. Vui lòng thử lại');
            }
        }
        $this->set(['title'=>'Đăng ký tài khoản']);
    }
    public function verification($token)
    {
        $userTable = TableRegistry::get('Users');//Lấy dữ liệu bảng uses
        $verify = $userTable->find()->where(['u_token'=>$token])->first();//lấy tất cả thông tin những token gửi vào
        if($verify->verified == 1){
            return $this->redirect(['controller'=>'Products','action'=>'index']);
        }else{
            $verify->verified = '1';

            $userTable->save($verify);
        }
        $this->set(['title'=>'Xác nhận tài khoản']);
    }

public function resetPass($token)
{
    if ($this->request->is('post')) {
        $haser = new DefaultPasswordHasher();
        $yPass =$haser->hash($this->request->getData('password'));
        $userTable = TableRegistry::get('Users');
        $user = $userTable->find('all')->where(['u_token'=>$token])->first();
        $user->u_password = $yPass;
        if($userTable->save($user)){
            return $this->redirect(['action'=>'login']);
        }
    }
    $this->set('title','Đặt lại mật khẩu');
}
public function forgotPass()
{
    if($this->request->is('post')){
        $yEmail = $this->request->getData('email');
        $yToken = Security::hash(Security::randomBytes(32));

        $userTable = TableRegistry::get('Users');
        $user = $userTable->find('all')->where(['u_email'=>$yEmail])->first();
        $user->u_password = '';
        $user->u_token = $yToken;
        if($userTable->save($user)){
            $this->Flash->success('Mật khẩu sẽ được gửi vào email của bạn. Vui lòng kiểm tra hộp thư');

            TransportFactory::setConfig('mailtrap', [
                'host' => 'smtp.mailtrap.io',
                'port' => 2525,
                'username' => 'd914e017da3afe',
                'password' => '1b4570676e5f28',
                'className' => 'Smtp'
            ]);

            $mailer = new Mailer('default');
                $mailer->setTransport('mailtrap');
                $mailer->setEmailFormat('html')
                        ->setSender('tungnt@mail.com','admin')
                        ->setSubject('Lấy lại mật khẩu')
                        ->setTo($yEmail)
                        ->deliver('Xin chào, '.$yEmail.'<br/> Vui lòng nhấn <a href="http://localhost:8765/users/reset-pass/'.$yToken.'">tại đây</a> để lấy lại mật khẩu');
            return $this->redirect(['action'=>'login']);
        }
    }
    $this->set('title','Lấy lại mật khẩu');
}
}