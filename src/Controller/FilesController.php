<?php

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Http\Response;
class FilesController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
        // $this->Auth->allow(['index', 'upload']);
    }
    public function index()
    {
        $file = $this->Files->find('all');

        $this->set(array('files' => $file, 'title'=>'Quản lý ảnh'));
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

    public function delete($id = null)
    {
        $file = $this->Files->get($id);

        $path = WWW_ROOT.$file->path;
        if(unlink($path)){
            $this->Files->delete($file);
            return $this->redirect(['action'=>'index']);
        }
    }

    public function download($id = null)
    {
        $file = $this->Files->get($id);
        $path = WWW_ROOT.$file->path;
        // $this->response->file(WWW_ROOT.$file->path, array(
        //     'download' => true,
        //     'name' => $file->name,
        // ));
        
        // return $this->response;

        $response = $this->response->withFile(
            $path,
            ['download' => true, 'name' => $file->name]
        );
        return $response;
        if($response){
            return $this->redirect(['action'=>'index']);
        }

    }

}