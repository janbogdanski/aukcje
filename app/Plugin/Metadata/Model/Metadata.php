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
    private $default = array('Metadata' => array('title' => '','keywords' => '','description' => '',));
    public $cleanData = false;
    private function _getMeta($options = array()){
        $meta = $this->find('first', $options);
        if($meta){
            $meta['Metadata']['title'] =   !empty($meta['Metadata']['title']) ? $meta['Metadata']['title'] :$this->default['Metadata']['title'];
            $meta['Metadata']['keywords'] = !empty($meta['Metadata']['keywords']) ? $meta['Metadata']['keywords'] :$this->default['Metadata']['keywords'];
            $meta['Metadata']['og_title'] = !empty($meta['Metadata']['og_title']) ? @$meta['Metadata']['og_title']  : @$this->default['Metadata']['og_title'];
            $meta['Metadata']['og_description'] = !empty($meta['Metadata']['og_description']) ? @$meta['Metadata']['og_description']  : @$this->default['Metadata']['og_description'];
        }
        return $meta;
    }

    /**
     * @param array $args klucze - controller action path(=slug) plugin
     * @return array|bool
     */
    public function getMeta($args = array()){

        //pobierz default i wybierz, gdy jakies pole jest puste w konkretnym przypadku
        //ustaw startowe wartosci na podstawie argumentow - plugin i path sa opcjonalne
        $options = array(
            'conditions' => array(
                'Metadata.path' => 'default',
                'Metadata.plugin' => 'default',
                'Metadata.controller' => 'default',
                'Metadata.action' => 'default',
            ),

        );
        $this->default = $this->_getMeta($options);

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