<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:11
 */

App::uses('AuthComponent', 'Controller/Component');
/**
 */
class Template extends AppModel {
    public $name = 'Template';


    public function prepareTemplates($templates = array()){

        $return = array();
        foreach ($templates as $template) {

            $return[$template[$this->name]['id']] = '<img src="'.$template[$this->name]['image_thumb'].'" alt="'.$template[$this->name]['name'].'" title="'.$template[$this->name]['name'].'">';
        } //end foreach

        return $return;
    }

}