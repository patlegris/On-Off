<?php

nextendimport('nextend.form.element.list');

class NextendElementK2menuitems extends NextendElementList {

    function fetchElement() {

        $db = JFactory::getDBO();
        
        $query = 'SELECT m.*, m.name AS title, m.parent AS parent, m.parent AS parent_id  FROM #__k2_categories m WHERE published = 1 ORDER BY parent, ordering';

        $db->setQuery($query);
        $menuItems = $db->loadObjectList();

        $children = array();
        if ($menuItems) {
            foreach ($menuItems as $v) {
                $pt = $v->parent_id;
                $list = isset($children[$pt]) ? $children[$pt] : array();
                array_push($list, $v);
                $children[$pt] = $list;
            }
        }
        jimport('joomla.html.html.menu');
        $options = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0);
        $this->_xml->addChild('option', 'Root')->addAttribute('value', 0);
        $optgroup = $this->_xml->addChild('optgroup', '');
        $optgroup->addAttribute('label', 'Categories');
        if (count($options)) {
            foreach ($options AS $option) {
                $optgroup->addChild('option', htmlentities($option->treename))->addAttribute('value', $option->id);
            }
        }
        $this->_value = $this->_form->get($this->_name, $this->_default);
        $html = parent::fetchElement();
        return $html;
    }

}
