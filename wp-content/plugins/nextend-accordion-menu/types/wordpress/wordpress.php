<?php
nextendimport('nextend.plugin.plugin');

class plgNextendMenuWordpress {
    
    var $_name = 'wordpress';
    
    function onNextendMenuList(&$list){
        $list[$this->_name] = $this->getPath();
    }
    
    function getPath(){
        return dirname(__FILE__).DIRECTORY_SEPARATOR.'wordpress'.DIRECTORY_SEPARATOR;
    }
}

NextendPlugin::addPlugin('nextendmenu', 'plgNextendMenuWordpress');