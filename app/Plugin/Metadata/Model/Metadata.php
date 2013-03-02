<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:11
 */

//App::uses('AuthComponent', 'Controller/Component');
/**
 */
class Metadata extends AppModel {
    public $name = 'Metadata';
    public $cleanData = false;
    private function _getMeta($options = array()){

        return $meta = $this->find('first', $options);
    }

    /**
     * @param array $args klucze - controller action path(=slug) plugin
     * @return array|bool
     */
    public function getMeta($args = array()){

        //ustaw startowe wartosci na podstawie argumentow - plugin i path sa opcjonalne
        $options = array();
        $path = false;
        $plugin = false;
        $options['conditions']['Metadata.controller'] = $args['controller'];
        $options['conditions']['Metadata.action'] = $args['action'];
        if(isset($args['path'])){
            $path = true;
            $options['conditions']['Metadata.path'] = $args['path'];
        } else{
            $options['conditions'][] = array('Metadata.path' => '');
        }

        if(isset($args['plugin'])){
            $plugin = true;
            $options['conditions']['Metadata.plugin'] = $args['plugin'];
        } else{
            $options['conditions'][] = array('Metadata.plugin' => '');
        }

        //pobierz i sprawdz czy jest rekord, jesli nie, usun z tablicy warunki - najpierw path, action, controller i plugin
        $meta = $this->_getMeta($options);
        if($meta){
            return $meta;
        }

        //spr czy byl dany path
        if($path){
            unset($options['conditions']['Metadata.path']);
            $options['conditions'][] = array('Metadata.path' => '');
            $meta = $this->_getMeta($options);
        }
        if($meta){
            return $meta;
        }

        //spr action
        unset($options['conditions']['Metadata.action']);
        $options['conditions'][] = array('Metadata.action' => '');
        $meta = $this->_getMeta($options);
        if($meta){
            return $meta;
        }

        //spr controller
        unset($options['conditions']['Metadata.controller']);
        $options['conditions'][] = array('Metadata.controller' => '');
        $meta = $this->_getMeta($options);
        if($meta){
            return $meta;
        }

        //spr plugin
        if($plugin){

            unset($options['conditions']['Metadata.plugin']);
            $options['conditions'][] = array('Metadata.plugin' => '');
            $meta = $this->_getMeta($options);
        }
        if($meta){
            return $meta;
        }
        return false;
    }
}