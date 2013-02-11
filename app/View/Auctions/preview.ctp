<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
// echo $code;

//echo $this->element("Auctions/{$templateName}");
//print_r($this->get('auction'));
//die();

foreach($this->get('auction') as $k => $v){
    $this->assign($k, (string)$v);

}
$this->assign('footer', (string)$this->get('footer'));

$this->extend("templates/{$templateName}");


