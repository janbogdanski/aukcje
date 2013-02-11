<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    //mechanizm czyszczenia przesylanych danych z niebezpiecznych tagow itp

    /**
     * @var array - indeksowana tablica name'ow formularza obslugiwanych przez dany model,
     * zostana tu tylko tagi dostepne w allegro
     *
     */
    public $cleanDataLeave = array();

    /**
     * @var string tagi do strip_tags, akceptowane przez allegro
     */
    public $allowedTags =
    '<a><abbr><acronym><address><area><b><basefont><bdo><big><blockquote><body><br><button><caption><center><cite><code><col><colgroup><dd><del><dfn><dir><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><head><hr><i><img><ins><isindex><kbd><label><legend><li><map><menu><nobr><noframes><noscript><ol><optgroup><option><p><pre><q><s><samp><select><small><span><strike><strong><sub><sup><table><tbody><td><tfoot><th><thead><title><tr><tt><u><ul><var><style>';

    /**
     * Wyczysc przed zapisem wpisane dane, tagi html tylko dla pol z $cleanDataLeave (ale tylko akceptowane przez allegro)
     * @param array $options
     * @return bool
     */
    function beforeSave($options = array()) {

        if (!empty($this->data) && $this->cleanData === true) {
            $connection = (!empty($this->useDbConfig)) ? $this->useDbConfig : 'default';

            $this->data = $this->cleanData($this->data,array('connection' => $connection, 'escape' => false));
        }
        return true;
    }

    /**
     * Pomocnicza, rekurencyjnie wywolywana, czysci  Sanitize::clean, lub strip_tags(definiowane w modelu w $cleanDataLeave)
     * @param $data
     * @param array $options
     * @return array|mixed
     */
    private  function cleanData($data, $options = array()){

        if (is_array($data)) {
            foreach ($data as $key => $val) {
                if(in_array($key,$this->cleanDataLeave)){
                    $data[$key] = strip_tags($val,$this->allowedTags);
                    continue;
                }
                $data[$key] = $this->cleanData($val, $options);
            }
        } else{
            $data = Sanitize::clean($data,$options);
        }
        return $data;
    }
}
