<?php

nextendimport('nextend.form.element.list');

class NextendElementHikashopmenuitems extends NextendElementList {

    function fetchElement() {

        $db = JFactory::getDBO();
        
        $query = 'SELECT m.category_id AS id, m.category_name AS name, m.category_name as title, m.category_parent_id AS parent,  m.category_parent_id as parent_id
              FROM #__hikashop_category m
              WHERE (m.category_published =1 AND m.category_type="product") OR (m.category_type="root" AND m.category_published =0)
              ORDER BY m.category_ordering'; 

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
        if (count($options)) {
            foreach ($options AS $option) {
                $this->_xml->addChild('option', htmlspecialchars($option->treename))->addAttribute('value', $option->id);
            }
        }
        $this->_value = $this->_form->get($this->_name, $this->_default);
        $html = parent::fetchElement();
        return $html;
    }

}
