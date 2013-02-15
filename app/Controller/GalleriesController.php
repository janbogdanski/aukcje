<?php

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:23
 */
App::uses('Gallery', 'Model');
class GalleriesController extends AppController {

    public $uses = array('Auction','Gallery','GalleriesDetails', 'Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');
    public $helpers = array('PicasaImageSize');


    /**
     * @var Picasa
     */
    public $picasa,$user;


    public function beforeFilter(){
        parent::beforeFilter();
        require_once(VENDORS.DS.'picasa.php');
        $start = isset($_GET['start']) ? (int)$_GET['start'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 0;

        //potrzebne do pobrania
        $this->user = @$this->UserAuth->getUser();
        $this->picasa = new Picasa($this->user['User']['picasa'], $start,$limit);


    }

    public function index(){

        $options['conditions'] = array('Gallery.user_id' => $this->UserAuth->getUserId(),
            'Gallery.status !=' =>  Gallery::STATUS_NEW,
        );

        $this->Gallery->unbindModel(
            array('hasMany' => array('GalleriesDetails'))
        );
        $galleries = $this->Gallery->find('all',$options);


//                $dbo = $this->Auction->getDatasource()->getLog();
//        $lastLog = end($dbo['log']);
//        print_r($lastLog);

        $this->set('galleries', $galleries);


    }

    public function code(){
        $this->layout = 'ajax';
        $this->Gallery->id = $this->request->params['pass'][0];

        $gallery = $this->Gallery->read();

        $this->request->data = $gallery;
        return $this->previewGallery();
    }
    public function view(){
        $this->layout = 'galleryPreview';
        $id = $this->request->params['pass'][0];
        if( !$id ) {
            $this->Session->setFlash(__('Invalid id for gallery'), 'notice');
            $this->redirect(array('action'=>'index'));
        }

        $gallery = $this->Gallery->find('first', array(
            'conditions' => array('Gallery.id' => $id)
        ));
//        print_r($gallery);

        if($gallery){

            $this->set('gallery', $gallery);
            if(isset($this->passedArgs['photo']) && (int)$this->passedArgs['photo'] <= count($gallery['Gallery']) && (int)$this->passedArgs['photo'] > 0){
                $photo = (int)$this->passedArgs['photo'];
            } else{
                $photo = 1;
            }
            $this->set('title_for_layout', $gallery['Gallery']['title']);
            $this->set('photo', (int)$photo);
        }
    }


    public function add(){
        $data = array(
            'Gallery' => array(
                'user_id' => $this->UserAuth->getUserId(),
                'status' => Gallery::STATUS_NEW,
            ),
        );
        $this->Gallery->create();
        if($gallery = $this->Gallery->save($data)){
            $this->redirect('edit/'.$gallery['Gallery']['id']);
        } else{
            die();
        }
    }

    public function edit(){

        $id = $this->request->params['pass'][0];
        if( !$id ) {
            $this->Session->setFlash(__('Invalid id for gallery'),'notice');
            $this->redirect(array('action'=>'index'));
        }

        $gallery = $this->Gallery->find('first', array(
            'conditions' => array('Gallery.id' => $id, 'Gallery.user_id' => $this->UserAuth->getUserId())
        ));

        if($gallery){

            if ($this->request->is('post') || ($this->request->is('put'))){
                //save new user
                if(count($this->request->data['GalleriesDetails']['image']) < 1){
                    $this->Session->setFlash(__('Select images, gallery not saved'), 'error');
                    $this->redirect(array('action'=>'add', $id));
                }

                $this->request->data['Gallery']['user_id'] = $this->UserAuth->getUserId();
                $this->request->data['Gallery']['mini'] = $this->request->data['GalleriesDetails']['image'][0];
                $this->request->data['Gallery']['status'] = Gallery::STATUS_ACTIVE;

//                print_r($this->request->data);
//                die();


                $this->Gallery->id = $id;
                if ($gallery_id = $this->Gallery->save($this->request->data)){

                    $this->GalleriesDetails->deleteAll(array('GalleriesDetails.gallery_id' => $id), false);


                    $order = 1;
                    foreach ($this->request->data['GalleriesDetails']['image'] as $image){



                        $this->GalleriesDetails->create();

                        $data = array(
                            'GalleriesDetails' => array(
                                'gallery_id' => $id,
                                'image' => $image,
                                'order' => $order,
                            ),
                        );
                        if($gallery_details = $this->GalleriesDetails->save($data)){

                        }
                        $order++;
                    } //end foreach



                    //set flash to user screen
                    $this->Session->setFlash(__('Gallery successfully saved'),'good');
                    //redirect to user list
                    $this->redirect(array('action' => 'index'));

                }else{

                    //if save failed
                    $this->Session->setFlash(__('Unable to add gallery. Please, try again.'),'error');

                }
            } else{
                $this->request->data = $gallery;

            }

            $this->set('gallery', $gallery);
        }

        if(isset($this->passedArgs['albumid']) && !empty($this->passedArgs['albumid'])){

            $photos = $this->picasa->getAlbumPhotos($this->passedArgs['albumid']);
             $album_title = $this->picasa->album_title;

            $this->set('photos', $photos);
            $this->set('album_title', $album_title);

        } else{

            $albums = $this->picasa->getAlbums();
            $this->set('albums', $albums);
        }

        $this->view = 'add';
    }

    public function delete(){

        $id = $this->request->params['pass'][0];

        //the request must be a post request
        //that's why we use postLink method on our view for deleting user
        if( $this->request->is('get') ){

            $this->Session->setFlash(__('Delete method is not allowed.'),'notice');
            $this->redirect(array('action' => 'index'));

            //since we are using php5, we can also throw an exception like:
            //throw new MethodNotAllowedException();
        }else{

            if( !$id ) {
                $this->Session->setFlash(__('Invalid id for gallery'),'notice');
                $this->redirect(array('action'=>'index'));

            }else{
                //delete user
                $gallery = $this->Gallery->find('first', array(
                    'conditions' => array('Gallery.id' => $id, 'Gallery.user_id' => $this->UserAuth->getUserId())
                ));
                if(($gallery)){

                    if( $this->Gallery->delete($id) ){
                        //set to screen
                        $this->Session->setFlash(__('Gallery was deleted.'),'good');
                        //redirect to users's list
                        $this->redirect(array('action'=>'index'));

                    }else{
                        //if unable to delete
                        $this->Session->setFlash(__('Unable to delete gallery.'),'notice');
                        $this->redirect(array('action' => 'index'));
                    }
                }
            }
        }
    }

    private function albums(){
        $albums = $this->picasa->getAlbums();
        $this->set('albums', $albums);
        $this->set('hasPicasa', $albums);
        $this->view = 'albums';
        return true;

    }
    private function photos($albumid = null){
        if(!is_null($albumid)){
            $photos = $this->picasa->getAlbumPhotos($albumid);

        } else{
            $albumid = $_GET['albumid'];
            $photos = $this->picasa->getAlbumPhotos($_GET['albumid']);
        }


        $query = http_build_query(array(
            'albumid' => $albumid,
            'start' => $this->picasa->getStart() + $this->picasa->getLimit(),
            'limit' => $this->picasa->getLimit(),
        ));

        $this->set('photos', $photos);
        $this->set('query', $query);

        $this->view = 'photos';

        return true;

    }
    private function setUser(){

        $this->view = 'setUser';
    }
    public function imageBrowser(){
        $this->layout = 'imageBrowser';

        if(isset($_GET['albumid']) && !empty($_GET['albumid'])){

            return $this->photos();
        } else{
            return $this->albums();

        }

    }

    public function galleryBrowser(){
        $this->layout = 'imageBrowser';

        $options['conditions'] = array('Gallery.user_id' => $this->UserAuth->getUserId(),
            'Gallery.status !=' =>  Gallery::STATUS_NEW,
        );

        $this->Gallery->unbindModel(
            array('hasMany' => array('GalleriesDetails'))
        );
        $this->set('galleries', $this->Gallery->find('all',$options));


    }

    private function previewGallery(){

        $this->set('gallery', $this->request->data);

        switch($this->request->data('type')){

            case 1:
            default:
                $this->view = 'templates/one_big';
                break;
            case 2: //echo 2;
                break;




        }

        return true;
    }

    public function ajax(){
        $this->layout = 'ajax';

        if(isset($_POST['setUser'])){

            $user = $_POST['user'];
            $this->User->id = $this->UserAuth->getUserId();
            $this->User->set('picasa', $user);
            $this->User->save();
            $this->Session->write('UserAuth.User.picasa',$user);
            return $this->albums();
        }

        if(isset($_POST['action']) && 'previewGallery' == $_POST['action']){

            return $this->previewGallery();
        }
        if(isset($_POST['action']) && 'getAlbumPhotos' == $_POST['action']){


            return $this->photos($_POST['albumid']);
        }
        if(isset($_POST['action']) && 'getGalleryCode' == $_POST['action']){

            $this->Gallery->id = $_POST['gallery'];
            $gallery = $this->Gallery->read();

            $this->request->data = $gallery;
            return $this->previewGallery();
        }

//        die();

    }

}
