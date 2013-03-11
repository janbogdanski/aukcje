<?php

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:23
 */
App::uses('Sanitize', 'Utility');
class AuctionsController extends AppController {

    public $uses = array('Auction','Template');
    public $helpers = array('Cksource');


    public function beforeFilter(){
        parent::beforeFilter();
    }

    public function index() {
        //to retrieve all users, need just one line
        $this->set('auctions', $this->Auction->findAllByUserId($this->UserAuth->getUserId()));
    }

    public function add(){

        //check if it is a post request
        //this way, we won't have to do if(!empty($this->request->data))
        if ($this->request->is('post')){
            //save new user


            $this->request->data['Auction']['user_id'] = $this->UserAuth->getUserId();

            if ($this->Auction->save($this->request->data)){

                //set flash to user screen
                $this->Session->setFlash(__('Auction successfully saved.'), 'good');
                //redirect to user list
                $this->redirect(array('action' => 'index'));

            }else{
                //if save failed
                $this->Session->setFlash(__('Unable to add auction. Please, try again.'), 'error');

            }
        }
        $this->set('templates', $this->Template->prepareTemplates($this->Template->findAllByPrice('free')));
    }

    public function preview(){
        if($this->request->is('ajax')){
            CakeResponse::disableCache();
            $this->layout = 'ajax';
        } else{
            $this->layout = 'auctionPreview';
        }
        $id = $this->request->params['pass'][0];

        if( !$id ) {
            $this->Session->setFlash(__('Invalid id for auction'),'info');
            $this->redirect(array('action'=>'index'));
        }

        $auction = $this->Auction->find('first', array(
            'fields' => array('Auction.*', 'Template.*'),
            'conditions' => array('Auction.id' => $id),
            'joins' => array(
                array('table' => 'templates',
                    'alias' => 'Template',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Template.id = Auction.template_id',
                    )
                )
            )
        ));
        $this->set('auction', $auction['Auction']);
        $this->set('templateName', $auction['Template']['name']);
        $this->set('footer', $this->Template->footers[array_rand(($this->Template->footers))]);
//        $dbo = $this->Auction->getDatasource()->getLog();
//        $lastLog = end($dbo['log']);
//        print_r($lastLog);
//        print_r($auction['Template']['code']);

//        $view = new View($this, false);
//        $view->set('code',$auction['Template']['code']);
//        $view->layout = 'ajax';
//        $a = $view->get('code');
//        print_r($a);
//        $html = $view->getVar('code');
//        print_r($view);
//        die();


//        $this->set('code', ($auction['Template']['code']));

//        $this->render(null,'ajax','/auctions/index/');

    }
    public function edit() {

        //get the id of the user to be edited
        $id = $this->request->params['pass'][0];

        if( !$id ) {
            $this->Session->setFlash(__('Invalid id for auction'), 'info');
            $this->redirect(array('action'=>'index'));
        }

        $auction = $this->Auction->find('first', array(
            'conditions' => array('Auction.id' => $id, 'Auction.user_id' => $this->UserAuth->getUserId())
        ));
        $this->set('templates', $this->Template->prepareTemplates($this->Template->findAllByPrice('free')));


        //check if a user with this id really exists
        if(($auction)){

            if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){

                //save user
                $this->Auction->id = $id;
                if( $this->Auction->save( $this->request->data ) ){

                    //set to user's screen
                    $this->Session->setFlash(__('Auction was edited.'), 'default', array(), 'good');

                    //redirect to user's list
                    $this->redirect(array('action' => 'index'));

                }else{
                    $this->Session->setFlash(__('Unable to edit auction. Please, try again.'),'error');
                }

            }else{

                //we will read the user data
                //so it will fill up our html form automatically
                $this->request->data = $auction;
            }

        }else{
            //if not found, we will tell the user that user does not exist
            $this->Session->setFlash(__('Auction does not exist.'), 'info');
            $this->redirect(array('action' => 'index'));

            //or, since it we are using php5, we can throw an exception
            //it looks like this
            //throw new NotFoundException('The user you are trying to edit does not exist.');
        }
    }

    public function delete() {
        $id = $this->request->params['pass'][0];

        //the request must be a post request
        //that's why we use postLink method on our view for deleting user
        if( $this->request->is('get') ){

            $this->Session->setFlash(__('Delete method is not allowed.'), 'error');
            $this->redirect(array('action' => 'index'));

            //since we are using php5, we can also throw an exception like:
            //throw new MethodNotAllowedException();
        }else{

            if( !$id ) {
                $this->Session->setFlash(__('Invalid id for auction'), 'info');
                $this->redirect(array('action'=>'index'));

            }else{
                //delete user
                $auction = $this->Auction->find('first', array(
                    'conditions' => array('Auction.id' => $id, 'Auction.user_id' => $this->UserAuth->getUserId())
                ));
                if(($auction)){

                    if( $this->Auction->delete($id) ){
                        //set to screen
                        $this->Session->setFlash(__('Auction was deleted.'), 'good');
                        //redirect to users's list
                        $this->redirect(array('action'=>'index'));

                    }else{
                        //if unable to delete
                        $this->Session->setFlash(__('Unable to delete auction.'),'info');
                        $this->redirect(array('action' => 'index'));
                    }
                }
            }
        }
    }

    /**
     * @deprecated
     */
    public function image(){
        $this->layout = 'imageBrowser';

        require_once(VENDORS.DS.'picasa.php');
        $start = isset($_GET['start']) ? (int)$_GET['start'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        $picasa = new Picasa('proaukcje', $start,$limit);
//$picasa->setStart($_GET['start']);
//$picasa->setLimit($_GET['limit']);
//print_r($_GET);
//die();

        ?>


    <?php
        if(isset($_GET['albumid']) && !empty($_GET['albumid'])){



            $photos = $picasa->getAlbumPhotos($_GET['albumid']);
            foreach($photos as $photo){
//                echo ' <a href="?feed='.$photo['image'].'"><img src="'.$photo['thumbnail']. '" /></a> ';

                echo '<a href="javascript:select_image(\''.$photo['image'].'\')"><img src="'.$photo['thumbnail'].'"></a>';


            }


            $query = http_build_query(array(
                'albumid' => $_GET['albumid'],
                'start' => $picasa->getStart() + $picasa->getLimit(),
                'limit' => $picasa->getLimit(),
            ));
            echo '<a href="?'.$query.'">'.$query.'</a> ';


        } else{
            $albums = $picasa->getAlbums();
            foreach($albums as $album){
                echo '<a href="?albumid='.$album['id'].'&CKEditorFuncNum='.$_GET['CKEditorFuncNum'].'"><img src="'.$album['thumbnail']. '" /></a> ';
            }
        }

        die();

    }


}
