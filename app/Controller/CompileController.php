<?php
//App::uses('AppController', 'AppController');

/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:23
 */
class CompileController extends AppController {


    public $layout = 'ajax';
    private $_read = 'style.less';
    private $_target = 'style.css';

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('add', 'login'); // Letting users register themselves
    }
    public function index($template){
        if(empty($template)){

            die('podaj tpl');
        }

        set_time_limit(0);

        require "lessphp/lessc.inc.php";
        try{
            $less = new lessc;

//        $less->importDir = array(CSS.'bootstrap_less/less');
            $less->importDir = array(WWW_ROOT);

            $css = $less->compileFile(CSS.'templates'.DS.$template.DS.$this->_read);
        } catch (exception $e) {
            echo "fatal error: " . $e->getMessage();
        }

        $this->set('css',$css);


        $this->render($template);

    }

    public function view($template){
        if(empty($template)){
            die('podaj tpl');
        }

        set_time_limit(0);


        $this->render($template);
    }
}
