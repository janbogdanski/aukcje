<?php

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:23
 */
//App::uses('Image', 'Model');
class ImagesController extends AppController {

    public $components = array('Upload' => array('max_size' => 3145728, 'file_types' => array('image/jpeg','image/gif','image/png')),
                               'Picasa','RequestHandler');

    public $helpers = array('Js' => 'Jquery', 'PicasaImageSize');

    public function beforeFilter(){
        parent::beforeFilter();

        $this->paginate = array(
            'limit' => 16,
            'order' => array(
                'Image.created' => 'desc',
            ),
            'conditions' => array('Image.user_id' => $this->UserAuth->getUserId()),

        );
    }


    function index() {

        if (!empty($this->passedArgs['updateId'])) {
            $this->set('updateId', $this->passedArgs['updateId']);
        }

        $images = $this->paginate();
        $this->set('images', $images);

        if ($this->request->is('ajax')) {
            $this->autoRender = false;

            //ajax pagination
            $this->render('/elements/images');
            return;
        }

        if ($this->request->is('requested')) {
            $this->autoRender = false;

            //gdy strona wczytywana jest 'nprmalnie' ale jako element (czyli np. z modulu galerii
            return array('images' => $images, 'paging' => $this->params['paging']);
        } else {

            //uruchamiana normalnie, np. index - lista obrazkow
            $this->set('data', $images);
        }
    }

    public function browser(){

        $this->layout = 'minimal';
        $data = $this->paginate('Image');
//        if ($this->request->is('requested')) {
//            return $data;
//        } else{

            $this->set('data', $data);
//        }
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
                    print_r($image);
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
    public function edit(){
        $this->layout = 'ajax';
        $id = str_replace('image-','',$_POST['imageId']);
        $url = $_POST['imageUrl'];
        $ext = explode('.',$url);
        $ext = end($ext);

        $uploaded = 'files/'.date("Ymdhis").rand(10,9876).'.'.$ext;
        file_put_contents($uploaded,file_get_contents($url));
        $image = $this->Picasa->picasa_upload($uploaded);

        $this->Image->id = (int)$id;
        $data = array(
            'user_id' => $this->UserAuth->getUserId(),
            'image' => $image['full_link'],
            'thumb' => $image['thumb_link'],
        );
        $this->Image->save($data);
        unlink($uploaded);
        $this->set(compact('image'));
        $this->render('upload');
    }

    public function delete(){

        $id = $this->request->params['pass'][0];

        //the request must be a post request
        //that's why we use postLink method on our view for deleting user
        if( $this->request->is('get') ){

            $this->Session->setFlash(__('Delete method is not allowed.'),'info');
            $this->redirect(array('action' => 'index'));

            //since we are using php5, we can also throw an exception like:
            //throw new MethodNotAllowedException();
        }else{

            if( !$id ) {
                $this->Session->setFlash(__('Invalid id for image'),'info');
                $this->redirect(array('action'=>'index'));

            }else{
                //delete user
                $image = $this->Image->find('first', array(
                    'conditions' => array('Image.id' => $id,  'Image.user_id' => $this->UserAuth->getUserId())
                ));
                if(($image)){

                    if( $this->Image->delete($id) ){
                        //set to screen
                        $this->Session->setFlash(__('Image was deleted.'),'good');
                        //redirect to users's list
                        $this->redirect(array('action'=>'index'));

                    }else{
                        //if unable to delete
                        $this->Session->setFlash(__('Unable to delete image.'),'info');
                        $this->redirect(array('action' => 'index'));
                    }
                }
            }
        }
        $this->redirect(array('action' => 'index'));
    }
}
