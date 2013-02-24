<?php

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:23
 */
//App::uses('Image', 'Model');
class ImagesController extends AppController {

    public $components = array('Upload' => array('max_size' => 3145728, 'file_types' => array('image/jpeg','image/gif','image/png')),
                               'Picasa');
    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Image.created' => 'desc'
        )
    );
    public function beforeFilter(){
        parent::beforeFilter();

    }

    public function index(){
        $data = $this->paginate('Image');
        $this->set('data', $data);
    }

    function upload(){
        $this->layout = 'ajax';
        $image = '';
        if($_POST){
        $files = $this->data['file']['image'];
            foreach ($files as $file){
                try{
                    $uploaded  = $this->Upload->upload($file,'files');
                    $image = $this->Picasa->picasa_upload($uploaded);

                    $data = array(
                        'user_id' => $this->UserAuth->getUserId(),
                        'image' => $image['full_link'],
                        'thumb' => $image['thumb_link'],
                    );
                    $this->Image->create();
                    $this->Image->save($data);
                    unlink($uploaded);

                } catch(Exception $e){
                    var_dump($e->getMessage());
                }
            } //end foreach
        }
        $this->set(compact('image'));
    }
}
