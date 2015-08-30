<?php

nextendimport('nextend.cache.data.data');

class NextendTreebase {

    var $_template;
    var $_module;
    var $_data;
    var $items;
    var $allItems;
    var $active;
    var $pointer;
    var $itemsCount;
    var $stack;
    var $level;
    var $endLevel;
    var $startLevel;
    var $improvedStartLevel;
    var $opened;
    var $openedlevels;
    
    var $ajax = false;
    var $ajaxlifetime = 1000;
	
	  var $res = array();

    function __construct(&$menu, &$module, &$data) {

        $this->_menu = $menu;
        $this->_module = $module;
        $this->_data = $data;
        $ajax = (array)NextendParse::parse($this->_data->get('ajax', '0|*|1000'));
        if(isset($ajax[0]) && $ajax[0]) $this->ajax = 1;
        if(isset($ajax[1]) && intval($ajax[1])) $this->ajaxlifetime = intval($ajax[1]);
    }

    function generateItems() {
        $this->items = $this->getItemsTree();
    }

    function getItems() {
        if($this->ajax){
            $cache = NextendCacheData::getInstance();
            $a = $cache->cache('mod_accordionmenu', $this->ajaxlifetime, array($this, 'filterItems'), array($this->_menu->_cachehash));
        }else{
            $a = $this->filterItems();
        }
        
        $this->helper = $a[0];
        $this->allItems = $a[1];

        /*
          If COOKIE tracking enabled
         */
        if ($this->opened == 3) {
            foreach ($_COOKIE AS $k => $v) {
                $id = $this->_menu->getId();
                $navClassPrefix = $this->_menu->_classPrefix;
                if ($v == 1 && strpos($k, $id) !== false) {
                    $val = (int) str_replace($id . '-' . $navClassPrefix, '', $k);

                    if ($val > 0 && isset($this->allItems[$val])) {
                        $this->allItems[$val]->opened = true;
                    }
                }
            }
        }
        
        
        $this->active = $this->getActiveItem();
        $root = 0;
        if (isset($this->active)) {
            $i = $this->active->id;
            $stack = array(
                $this->active->id
            );
            $el = $this->active;
            while (true) {
                if (!isset($this->allItems[$i]))
                    break;
                $el = $this->allItems[$i];
                $i = $el->parent;
                if (in_array($i, $stack))
                    break;
                $stack[] = $i;
            }
            $c = count($stack);
            if ($c > 0) {
                switch ($this->_config['active']) {
                    case 1:
                        $this->allItems[$stack[0]]->active = true;
                        break;
                    case 2:
                        foreach ($stack AS $s) {
                            $this->allItems[$s]->active = true;
                        }
                        break;
                }
                switch ($this->opened) {
                    case 1:
                        $this->allItems[$stack[0]]->opened = true;
                        break;
                    case 2:
                        foreach ($stack AS $s) {
                            @$this->allItems[$s]->opened = true;
                        }
                        break;
                }
            }
            if ($this->startLevel > 0) {
                if ($this->improvedStartLevel) {
                    while ($this->startLevel != 0) {
                        if (isset($stack[$c - $this->startLevel - 1]) && isset($this->helper[$stack[$c - $this->startLevel - 1]])) {
                            $root = $stack[$c - $this->startLevel - 1];
                            break;
                        }
                        $this->startLevel--;
                    }
                } else {
                    $root = - 1;
                    if (isset($stack[$c - $this->startLevel - 1])) {
                        $root = $stack[$c - $this->startLevel - 1];
                    }
                }
            }
        }
        $p = new stdClass();
        if ($root > 0 && isset($this->allItems[$root])) {
            if($this->_config['rootasitem'] == 1){
                unset($this->helper[$this->allItems[$root]->parent]);
                $this->helper[$this->allItems[$root]->parent][] = $this->allItems[$root];
                $p->id = $this->allItems[$root]->parent;
            }else{
                $p = $this->allItems[$root];
            }
        } else {
            $p->id = $root;
        }
        return $this->getChilds($p, 1);
    }

    function filterItems($cachehash = '') {

        $allItems = $this->getAllItems();
        
        $helper = array();
        foreach ($allItems as $item) {
            if (!is_object($item))
                continue;
            $item->p = false; // parent

            $item->fib = false; // First in Branch

            $item->lib = false; // Last in Branch

            if (!property_exists($item, 'opened')) {
                if ($this->opened == - 1) {
                    $item->opened = true; // Opened
                } else {
                    $item->opened = false; // Opened
                }
            }
            $item->active = false; // Active

            $helper[$item->parent][] = $item;
        }
        return array($helper, $allItems);
    }

    function getChilds(&$parent, $level) {

        $items = array();
        if (isset($this->helper[$parent->id])) {
            $helper = & $this->helper[$parent->id];

            //usort($helper, array($this, "menuOrdering")); // It can slow down the proccess. Not required every time... With this the process half as fast...
            $helper[0]->fib = true;
            $helper[count($helper) - 1]->lib = true;
            if ($level <= $this->endLevel) {
                $i = 0;
                $keys = array_keys($helper);
                for ($j = 0; $j < count($keys); $j++) {
                    $h = & $helper[$keys[$j]];
                    $h->parent = & $parent;
                    $childs = $this->getChilds($h, $level + 1);
                    if (count($childs) > 0)
                        $h->p = true;
                    $h->level = $level;
                    if(isset($this->openedlevels[$level]) && $h->p){
                        $h->opened = true;
                    }
                    $items[] = & $h;
                    $i = count($items);
                    array_splice($items, $i, 0, $childs);
                }
            }
        }
        return $items;
    }

    function filterItem($item) {

        $item->nname = '<span>' . stripslashes($item->name) . '</span>';
    }

    function filterItemTree(&$item, &$content) {
        
    }

    function menuOrdering(&$a, &$b) {

        return 0;
    }
    
    function getRes(){
        return $this->res;
    }

    function render($template) {
        $this->pointer = 0;
        $this->itemsCount = count($this->items);
        $this->_template = $template;
        $this->stack = array();
        $this->level = 1;
        $this->up = false;
        

        if($this->ajax){
            $this->renderCached = $this->checkRes();
        }else{
            $this->renderCached = false;
        }
        $this->renderItem();
		
    		if(count($this->res)){
    			$this->cacheRes();
    		}
    }

    function renderItem() {
        while ($this->pointer < $this->itemsCount) {
            $content = '';
            $item = & $this->items[$this->pointer++];
            if(!isset($item->classes)) $item->classes = '';
            $this->filterItem($item);
            $this->filterItemTree($item, $content);
            include $this->_template;
        }
        if ($this->up) {
            while ($this->level > 1) {
                echo "</dl>";
                $this->endItem(array_pop($this->stack));  //dd close
                $this->level = count($this->stack);
            }
            $this->up = false;
        }
    }
    
    function endItem($item){
        if($this->ajax && (!$this->renderCached || $item->opened)){
            $this->res[$item->id] = ob_get_clean();
            if($item->opened) echo $this->res[$item->id];
        }
        echo "</dd>";
    }

    function initConfig() {

        $slice = explode('|*|', $this->_data->get('slice', '0|*|0|*|0'));
        $this->endLevel = $slice[1];
        if ($this->endLevel == 0)
            $this->endLevel = 1000;
        $this->startLevel = $slice[0];
        $this->improvedStartLevel = $slice[2];
        $this->opened = $this->_data->get('opened', 2);
        $ol = NextendParse::fromArray($this->_data->get('openedlevels', ''));
        $this->openedlevels = array_flip($ol);

        $this->_config = array();
        $this->_config['active'] = intval($this->_data->get('active', 1));
        $this->_config['parentlink'] = intval($this->_data->get('parentlink', 0));

        $this->_config['rootasitem'] = intval($this->_data->get('rootasitem', 0));

        $this->_config['displaynum'] = intval($this->_data->get('displaynum', 0));
    }

    function initMenuicon() {
        $menuicons = explode('|*|', $this->_data->get('menuicons', '0|*|0|*|0'));

        $this->_config['menuiconshow'] = intval(@$menuicons[0]);
        $this->_config['menuiconalign'] = intval(@$menuicons[1]);
        $this->_config['menuiconaslink'] = intval(@$menuicons[2]);
    }

    function parseIcon(&$item, $iconurl, $alias = '') {

        $image = '<img src="' . $iconurl . '" class="nextend-menu-icon" alt="' . $alias . '" />';
        if ($this->_config['menuiconaslink'])
            $item->nname = '';
        switch ($this->_config['menuiconalign']) {
            case 1:
                $item->nname = $item->nname . $image;
                break;
            default:
                $item->nname = $image . $item->nname;
                break;
        }
    }

    function renderProductnum($productnum) {
        return '<span class="nextend-productnum">' . $productnum . '</span>';
    }
	
  	function cacheRes(){
        $cache = NextendCacheData::getInstance();
        return $cache->cache('mod_accordionmenu', $this->ajaxlifetime, array($this, 'getRes'), array($this->_menu->_cachehash.'-'.$this->_menu->_cachemoduleid));
  	}
	
  	function checkRes(){
        $cache = NextendCacheData::getInstance();
        return $cache->check('mod_accordionmenu', array($this, 'getRes'), array($this->_menu->_cachehash.'-'.$this->_menu->_cachemoduleid));
  	}
  	
  	function renderChild($parent, $hash = ''){
        if(!$this->checkRes()){
            ob_start();
            $this->_menu->render();
            ob_clean();
            $res = $this->res;
        }else{
            $res = $this->cacheRes();
        }
    		if(isset($res[$parent])) return $res[$parent];
  	}

}

?>