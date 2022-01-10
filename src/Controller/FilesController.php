<?php

namespace App\Controller;

use Cake\Utility\Security;
class FilesController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
        // $this->Auth->allow(['index', 'upload']);
    }
    public function index()
    {
        $file = $this->Files->find('all');

        $this->set(array('files' => $file, 'title'=>'Tải ảnh'));
    }

    public function upload()
    {
        if($this->request->is('post')){
            $image = $this->request->getData('file');
            $tmp = $image->getStream()->getMetadata('uri'); // lấy tpm_name
            $name = $image->getClientFilename();
            $ex = substr(strrchr($name,"."),1);
            $path = "upload/".Security::hash($name).".".$ex;
            $file = $this->Files->newEmptyEntity();
            $file->name = $name;
            $file->path = $path;
            $file->created_at = date("Y-m-d");
            if(move_uploaded_file($tmp, WWW_ROOT.$path)){
                $this->Files->save($file);
                return $this->redirect(['action'=>'index']);
            }
        }

        $this->set(array('title'=>'Tải ảnh'));
    }
}