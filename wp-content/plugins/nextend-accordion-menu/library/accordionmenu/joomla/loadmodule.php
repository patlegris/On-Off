<?php
jimport( 'joomla.plugin.helper' );
JPluginHelper::importPlugin( 'content', 'loadmodule'); 

/* Joomla 1.5 */
if(!class_exists('plgContentLoadmodule')){
  class plgContentLoadmodule{
    function _load($position, $style){
      return plgContentLoadPosition($position, $style);
    }
  }
}

class NextendLoadModule extends plgContentLoadmodule{
  function parse($match){
    $matcheslist = explode(',', $match);
		if (!array_key_exists(1, $matcheslist)) {
			$matcheslist[1] = 'none';
		}

		$position = trim($matcheslist[0]);
		$style    = trim($matcheslist[1]);
    return self::_load($position, $style);
  }
}