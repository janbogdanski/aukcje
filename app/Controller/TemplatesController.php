<?php
//App::uses('AppController', 'AppController');

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:23
 */
class TemplatesController extends AppController {

    public $components = array(
        'Allegro'
    );

    public function index(){
        set_time_limit(0);
//        $dump = ($this->Allegro->__getFunctions());
//        foreach($dump as $fun){
//            $list = substr($fun,0,4);
//            if('list' == $list) continue;
//            
//            $fun = preg_replace('/^[a-zA-Z0-9]+\s/is','',$fun);
//            $only = preg_match('/^([a-zA-Z0-9]+)\(/is',$fun,$match);
//            echo "* @method {$fun} <a href=\"http://allegro.pl/webapi/documentation.php/show/id,643\">{$match[1]}</a>";
//            echo "\n";
//            
//            
//        }
//        die();
//        print_r($this->webroot);
//        die();
        require "lessphp/lessc.inc.php";

        $less = new lessc;
//            echo $less->compile(".block { padding: 3 + 4px }");
        echo $less->compileFile(APP.WEBROOT_DIR.DS.'css/style.less');


        die();
        try{

    
            //row-id ostatniego przemielonego rekordu - punkt od ktorego pobieramy

//            $last = 8011704760;
            $last = 7986736997;

//            liczba zdarzen i data ostatniego
            $info = $this->Allegro->doGetSiteJournalInfo('session', $last);
            
            if(count($info)){

                $data = $this->Allegro->getSiteJournal($last);
//                print_r($data);
                foreach ($data as $event) {

                    if('now' == $event->{'change-type'}){
                        print_r($event);
                        $items[] =$event->{'item-id'};

//

                    }
                } //end foreach
                $offers =   $this->Allegro->doMyAccount2('session','sold',0,array(2729547311),5);
                print_r($offers);

                die();
                
                $offers =   $this->Allegro->doGetPostBuyData('session',$items);
                print_r($offers);
                
            }

            die();
            
            print_r($this->Allegro->doGetUserID('country-id', 'hallibucik' ,'','webapkey'));

        } catch(Exception $e){
//            print_r($e->getMessage());
            
        }
        
    }
  
    
    
}
