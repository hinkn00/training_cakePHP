<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;


class AppController extends Controller 
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
            'authenticate' => [
                'Form' => [
                    'fields' => ['username'=>'u_email','password'=>'u_password'],
                    'scope' => ['verified'=> '1', 'role'=>1],
                    'userModel' => 'Users'
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Products',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // 'storage' => 'Session',
            'authError' => 'Vui lòng đăng nhập trước khi truy cập',
        ]);
        // $this->Auth->allow('register','login','verification');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        $this->Auth->allow([ 'logout']);    
        
        if($this->Auth->User()){
            if($this->roleUser() !== 1){
                header('location: /'); exit();
            }
        }
    }

    public function roleUser()
    {
        return $this->Auth->User('role');
    }
}
