<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    08.02.13 19:26
 */

class Setting extends AppModel {
    var $name = 'Settings';

    public function get($key){
        $return = '';
        $setting = $this->find('first',array('conditions' => array('Setting.key' => $key)));
        if($setting){
        
            if($setting['Setting']['crypted']){
            
                //encr
//                $setting['Setting']['value'] = ...
            }
            $return = $setting['Setting']['value'];
        }
        return $return;
    }

    public function setval($key,$value){
        $setting = $this->find('first',array('conditions' => array('Setting.key' => $key)));
        if($setting){
            if($setting['Setting']['crypted']){
                //zaszyftuj
//                $value = ...
            }
        }
        $this->id = $setting['Setting']['id'];
        $this->set(array(
            'value' => $value,
        ));
        $this->save();
    }
}