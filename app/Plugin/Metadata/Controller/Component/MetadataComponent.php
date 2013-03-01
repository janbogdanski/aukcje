<?php
class MetadataComponent extends Component  {

	/**
	 * The name of the component.
	 *
	 * @var string
	 * @access public
	 */
	var $name = 'Metadata';
    public $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth');
//    public $uses = array('Metadata');

	/**
	 * The name of the plugin this component is in.
	 *
	 * @var string
	 * @access public
	 */
	var $plugin = 'Metadata';

	/**
	 * Name of the config file and var expected to exist in
	 * the config file. Can include extension.
	 *
	 * @var string
	 * @access public
	 */
//	var $config = 'metadata.php';

	/**
	 * The storage for the metadata items before being added
	 * to the helper include.
	 *
	 * @var array
	 * @access public
	 */
	public $metadata = array();

	/**
	 * Merges settings with defaults and adds the results to the
	 * settings array in the controllers name key.
	 *
	 * @param object $controller
	 * @param array $config
	 * @access public
	 * @return void
	 */
	function initialize(&$controller, $config = array()) {
        parent::initialize($controller,$config);

        if (count($config)) {
			foreach ($config as $key => $value) {
				if (isset($this->{$key})) {
					$this->{$key} = $value;
				}
			}
		}
	}

	/**
	 * Sprawdzamy plugin, controller, action i ew slug - pobieramy na ich podstawie z db meta tagi
	 *
	 * @param object $controller
	 * @access public
	 * @return void
	 */
	function startup(&$controller) {
        $this->Metadata = ClassRegistry::init('Metadata.Metadata');
        $data = array();
        !is_null($controller->request->plugin) ? $data['plugin'] = $controller->request->plugin : null;
        !is_null($controller->request->slug) ? $data['path'] = $controller->request->slug : null;
        $data['controller'] = $controller->request->controller;
        $data['action'] = $controller->request->action;

        $this->metadata = $this->Metadata->getMeta($data)['Metadata'];
        return;
	}

	/**
	 * Checks if the controller has the metadataBeforeRender method
	 * and calls it. Then checks if and how the Metadata.Metadata
	 * helper is loaded, removes it if it was loaded manually, then
	 * adds it again but with all the metadata that was added during
	 * this component.
	 *
	 * @param object $controller
	 * @access public
	 * @return bool
	 */
	function beforeRender(&$controller) {
        $controller->helpers[$this->name.'.'.$this->plugin] = $this->metadata;

        return;
	}
}
