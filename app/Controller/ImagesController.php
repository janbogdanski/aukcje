<?php

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:23
 */
//App::uses('Image', 'Model');
class ImagesController extends AppController {

    public $components = array('Upload' => array('max_size' => 3145728, 'file_types' => array('image/jpeg','image/gif','image/png')));

    public function beforeFilter(){
        parent::beforeFilter();

    }

    public function index(){
    }

    function upload(){
        if($_POST){
        $files = $this->data['file']['image'];
            foreach ($files as $file){
                try{

                    $uploaded  = $this->Upload->upload($file,'files');
                } catch(Exception $e){
                    var_dump($e->getMessage());
                }
            } //end foreach
        }
    }
    private function _upload(){

    }
}
