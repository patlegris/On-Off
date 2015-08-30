<?php

require_once(NEXTEND_ACCORDION_MENU . 'library' . DIRECTORY_SEPARATOR . 'accordionmenu'. DIRECTORY_SEPARATOR . 'wordpress' . DIRECTORY_SEPARATOR . 'treebase.php' );

class NextendTreeWordpress extends NextendTreebaseWordpress {

    var $alias;
    var $parentName;
    var $name;

    function __construct(&$menu, &$module, &$data) {

        parent::__construct($menu, $module, $data);
        $this->initConfig();
    }

    function initConfig() {

        parent::initConfig();

        $expl = explode('|*|', $this->_data->get('wordpressmenu', 'mainmenu|*|0'));
        $this->_config['menu'] = $expl[0];
        $this->_config['root'] = explode('||', $expl[1]);

        $this->initMenuicon();
    }

    function getAllItems() {
        $allItems = array();
        $items = wp_get_nav_menu_items($this->_config['menu'], array());
        if (!in_array('0', $this->_config['root'])) {
            if (count($this->_config['root']) === 1) {
                if ($this->_config['rootasitem']) {
                    for ($i = 0; $i < count($items); $i++) {
                        if ($items[$i]->ID == $this->_config['root'][0]) {
                            $items[$i]->menu_item_parent = 0;
                        } elseif ($items[$i]->menu_item_parent == 0) {
                            $items[$i]->menu_item_parent = -1;
                        }
                    }
                } else {
                    for ($i = 0; $i < count($items); $i++) {
                        if ($items[$i]->menu_item_parent == $this->_config['root'][0]) {
                            $items[$i]->menu_item_parent = 0;
                        } elseif ($items[$i]->menu_item_parent == 0) {
                            $items[$i]->menu_item_parent = -1;
                        }
                    }
                }
            } else {
                for ($i = 0; $i < count($items); $i++) {
                    if (in_array($items[$i]->ID, $this->_config['root'])) {
                        $items[$i]->menu_item_parent = 0;
                    } elseif ($items[$i]->menu_item_parent == 0) {
                        $items[$i]->menu_item_parent = -1;
                    }
                }
            }
        }

        for ($i = 0; $i < count($items); $i++) {
            $items[$i]->id = $items[$i]->ID;
            $items[$i]->parent = $items[$i]->menu_item_parent;
            $allItems[$items[$i]->id] = $items[$i];
        }
        return $allItems;
    }

    function getActiveItem() {
        $this->active = null;
        add_filter( 'wp_nav_menu_objects', array($this, 'find_active') );
        ob_start();
        wp_nav_menu( array('menu' => $this->_config['menu'] ));
        ob_end_clean();
        remove_filter( 'wp_nav_menu_objects', array($this, 'find_active') ); 
        return $this->active;
    }
    
    function find_active( $sorted_menu_items ){
        $closestActive = null;
        foreach ( $sorted_menu_items as $menu_item ) {
            if ($menu_item->current) {
                $closestActive = $menu_item;
                break;
            }else if ($menu_item->current_item_parent ) {
                $closestActive = $menu_item;
            }else if (!$closestActive && $menu_item->current_item_ancestor ){
                $closestActive = $menu_item;
            }
        }
        if($closestActive){
            $active = new stdClass();
            $active->id = $closestActive->ID;
            $active->parent = $closestActive->menu_item_parent;
            $this->active = $active;
        }
        return $sorted_menu_items;
    }

    function getItemsTree() {

        $items = $this->getItems();

        if ($this->_config['displaynum']) {
            for ($i = count($items) - 1; $i >= 0; $i--) {
                if (!property_exists($items[$i]->parent, 'productnum')) {
                    $items[$i]->parent->productnum = 0;
                }
                if (!property_exists($items[$i], 'productnum')) {
                    $items[$i]->productnum = 0;
                    $items[$i]->parent->productnum++;
                } else {
                    $items[$i]->parent->productnum+= $items[$i]->productnum;
                }
            }
        }
        return $items;
    }

    function filterItem($item) {
        
        $item->classes = implode(' ', $item->classes);
        
        $item->nname = '<span>' . $item->title . '</span>';
        
        if ($this->_config['displaynum'] && $item->productnum != 0) {
            $item->nname = $this->renderProductnum($item->productnum) . $item->nname;
        }
        
        if (!$this->_config['parentlink'] && $item->p) {
            $item->nname = '<a>' . $item->nname . '</a>';
        } else {
            $target = '';
            if(!empty($item->target)) $target =  'target="'.$item->target.'"';
            $item->nname = '<a '.$target.' href="' . $item->url . '">' . $item->nname . '</a>';
        }
    }

}

?>