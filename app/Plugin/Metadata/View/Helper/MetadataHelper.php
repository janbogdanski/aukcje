<?php
App::import('Helper', 'Html');
class MetadataHelper extends AppHelper {
	/**
	 * Name of the helper.
	 *
	 * @var string
	 * @access public
	 */
	var $name = 'Metadata';

	/**
	 * Additional helpers to be loaded.
	 *
	 * @var array
	 * @access public
	 */
    var $helpers = array('Html');

    /**
	 * If metadata was set from the Metadata component, it will be set
	 * here. To render call MetadataHelper::meta() with no params.
	 *
	 * @var array
	 * @access public
	 */
	var $metadata = array();
	var $view;

	/**
	 * Overwriting the default constructor to merge in the options that
	 * could be passed in from the controllers include
	 *
	 * @param array $options
	 * @access public
	 * @return void
	 */
    function __construct(View $view, $settings = array()){
		parent::__construct($view,$settings);
        $this->metadata = $settings;
        $this->view = $view;
	}

	/**
	 * Ustaw do widoku zmienne title, descr, keys, og
	 *
	 * @access public
	 * @return mixed
	 */
	function meta() {

        if(count($this->metadata )){
            if(array_key_exists('title',$this->metadata)){
                $this->view->set('TITLE', $this->metadata['title'].' :: '.Configure::read('Site.title'));
            }
            if(array_key_exists('description',$this->metadata)){
                $this->view->set('DESCRIPTION', $this->Html->meta('description',$this->metadata['description']));
            }
            if(array_key_exists('keywords',$this->metadata)){
                $this->view->set('KEYWORDS', $this->Html->meta('keywords',$this->metadata['keywords']));
            }

            if(array_key_exists('og_title',$this->metadata)){
                $this->view->set('OG_TITLE',
                    '<meta property="og:title" content="'.$this->metadata['og_title'].' - '. Configure::read('Site.title').'" />');
            }

            if(array_key_exists('og_description',$this->metadata)){
                $this->view->set('OG_DESCRIPTION','<meta property="og:title" content="'.$this->metadata['og_description'].'" />');

            }
            if(array_key_exists('og_image',$this->metadata) || Configure::read('Site.og.image')){
                $return = '';
                $images = $this->metadata['og_image'];
                $images = trim($images);
                $images = explode("\n", $images);
                $images = array_filter($images, 'trim');
                $images += (array)Configure::read('Site.og.image');
                foreach($images as $image){
                    $image = trim($image, "\r");
                    $return .= '<meta property="og:image" content="'.$image.'" />
                    ';
                }
                $this->view->set('OG_IMAGE', $return);
            }
        }
        return;
	}
}
