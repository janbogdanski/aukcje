<?php

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    24.02.13 11:20
 */
class PicasaComponent extends Component {

    private $_picasa_client;
    private $_picasa_albumid;
    private $_picasa_image_link;

    //tablica ustawien - login, pass..
    private $_picasa_settings;
    private $_picasa_email;
    private $_picasa_pass;

    //rozmiar obrazka typu full, przekazany jako /s{SIZE} w urlu
    private $_picasa_size;

    /**
     * @var Zend_Gdata_Photos
     */
    private $_picasa_service;

    /**
     * @var Zend_Gdata_Photos_AlbumQuery
     */
    private $_albumQuery;
    private $_albumEntry;
    /**
     * @var Zend_Gdata_Photos_PhotoEntry
     */
    private $_entry;

    /**
     * @var Zend_Gdata_App_MediaFileSource
     */
    private $_media;

//    public $uses = array('Setting');

    public function initialize(Controller $controller) {
        $this->_picasa_email = Configure::read('Picasa.email');
        $this->_picasa_pass = Configure::read('Picasa.pass');
        $this->Setting = ClassRegistry::init('Setting');

    }
    public function picasa_upload_helper(){

        $return = '';

        //autoryzacja
        $this->_picasa_upload_helper();
        try{

            //upload obrazka
            $uploaded = $this->_picasa_service->insertPhotoEntry($this->_entry, $this->_albumEntry);
        } catch(Zend_Gdata_App_HttpException $e){

            if(403 == $e->getResponse()->getStatus()){

                //pewnie limit zdjec - nowy album
                //zaladuj zdjecie
                //zapisz id albumu
                $this->_picasa_create_album();
                $this->_picasa_upload_helper();
                $uploaded = $this->_picasa_service->insertPhotoEntry($this->_entry, $this->_albumEntry);

            }
        } //catch
        if(isset($uploaded) and $uploaded instanceof Zend_Gdata_Photos_PhotoEntry){

            //poprawny zapis - wyluskaj link do zdjecia
            $content = $uploaded->getMediaGroup()->getContent();
            $image_url = $content[0]->getUrl();
            $links = $this->prepareLinks($image_url, $this->_picasa_size);

            return $links;
        } else{
            return false;
        }
    }


    /**
     * Wspomagacz uploadu - tworzy instancje odpowiednich obiektow, inicjuje upload
     */
    private function _picasa_upload_helper(){
//        print_r(get_defined_constants());

        $this->_media = $this->_picasa_service->newMediaFileSource($this->_picasa_image_link);
        $this->_media->setContentType('image/jpeg');

        $this->_entry = new Zend_Gdata_Photos_PhotoEntry();
        $this->_entry->setMediaSource($this->_media);
        $this->_entry->setTitle($this->_picasa_service->newTitle('proaukcje'));

        $this->_albumQuery = new Zend_Gdata_Photos_AlbumQuery;
        $this->_albumQuery->setUser("proaukcje");
        $this->_albumQuery->setAlbumId($this->_picasa_albumid);

        try {
            //todo - jak nie ma albumu o podanym id, jest marnie
            $this->_albumEntry = $this->_picasa_service->getAlbumEntry($this->_albumQuery);
        } catch (Zend_Gdata_App_Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    /**
     * Utworzenie albumu i zapisanie id w opcjach w bazie
     */
    private function _picasa_create_album(){
        $this->_entry = new Zend_Gdata_Photos_AlbumEntry();
        $this->_entry->setTitle($this->_picasa_service->newTitle("proaukcje ".date("Y-m-d H:i:s")));
        $this->_entry->setGphotoAccess(new Zend_Gdata_Photos_Extension_Access('public')); //private, protected, public

        $album_id = $this->_picasa_service->insertAlbumEntry($this->_entry);
        $this->_picasa_albumid = (string)$album_id->getGphotoId()->__toString();

        $this->Setting->setval('picasa_album_id',$this->_picasa_albumid);
//        $this->proaukcjesettings_m->set_picasa_settings('picasa_album_id', $this->_picasa_albumid);
    }


    /**
     * Autoryzacja na zadanie
     */
    private function _picasa_auth_helper(){
        if(!$this->_picasa_client || !$this->_picasa_service){

            App::import('Vendor', 'zend_include');
            App::import('Vendor', 'Zend_Gdata', true, false, 'Zend/Gdata.php');
            App::import('Vendor', 'Zend_Gdata_ClientLogin', true, false, 'Zend/Gdata/ClientLogin.php');
            App::import('Vendor', 'Zend_Gdata_Photos', true, false, 'Zend/Gdata/Photos.php');
            App::import('Vendor', 'Zend_Gdata_Photos_AlbumQuery', true, false, 'Zend/Gdata/Photos/AlbumQuery.php');

            $service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;

            $this->_picasa_client = Zend_Gdata_ClientLogin::getHttpClient( $this->_picasa_email,  $this->_picasa_pass, $service);
            $this->_picasa_service = new Zend_Gdata_Photos($this->_picasa_client);
        } //if client
    }


    /**
     * Metoda dla controllerow do uploadu
     * @param string $image_url - jesli obrazek przychodzi z innego modulu np. logo
     */
    public function picasa_upload($image_url = ''){

        ignore_user_abort(1);

//        if(!$_POST){
//            return false;
//        }

        $return = array();

        //wczytaj credentiale do picasy
//        $this->_picasa_settings = array();

        //rozpoczynamy upload do picasy - autoryzacja
        $this->_picasa_auth_helper();


        //ustawiamy id albumu z opcji
        $this->Setting = ClassRegistry::init('Setting');
        $this->_picasa_albumid = $this->Setting->get('picasa_album_id');


        //ustaw rozmiar full linka
//        if($this->input->post('resize')){
//            $this->_picasa_size = $this->input->post('size');
//        } else{
            $this->_picasa_size = 0;
//        }
//
        $this->_picasa_image_link = $image_url;
      return  $links = $this->picasa_upload_helper();
    }
    public function prepareLinks($full_link, $size = false){
        if($size){
            $size = (int)$size;
        }

        $image_link = str_replace('ggpht.com', 'googleusercontent.com', $full_link);
        $suffix = basename($image_link);

        $full_link = str_replace($suffix, "s{$size}/{$suffix}",$image_link);
        $thumb_link = str_replace($suffix, "s150/{$suffix}",$image_link);
        return  array(
            'full_link' => $full_link,
            'thumb_link' => $thumb_link);
    }
}
