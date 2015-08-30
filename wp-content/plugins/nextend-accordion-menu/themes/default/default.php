<?php

nextendimport('nextend.plugin.plugin');

class plgNextendMenuthemeDefault {
    
    var $_name = 'default';
    
    function onNextendMenuThemeList(&$list){
        $list[$this->_name] = $this->getPath();
    }
    
    static function getPath(){
        return dirname(__FILE__).DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR;
    }
}
NextendPlugin::addPlugin('nextendmenutheme', 'plgNextendMenuthemeDefault');
