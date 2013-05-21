<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tab
 *
 * @author xavier
 */
include_once 'IContainerComponent.php';
include_once 'ListItem.php';

class Tab extends IContainerComponent {

    const NAV = "nav";
    const NAV_TABS = "nav-tabs";
    const TAB_CONTENT = "tab-content";

    public function __construct($header, $tabs, $columns = 0, $id = "", $classes = "", $prepend = "", $append = "") {
        parent::__construct($header, $tabs, $columns, $id, $classes, $prepend, $append, "ul");
    }

    protected function generateCode() {

        $tabHeader = new ListItem


        $content = !empty($this->header) ? "<fieldset><legend>$this->header</legend></fieldset>" : "";
        return $this->generateGenericStartTag($this->generateAttributes()) . $content .
                $this->generateGenericEndTag();
    }

    protected function generateAttributes() {
        $attributes = array();
        if ($this->getClasses()) {
            $attributes["class"] = $this->addQuotes($this->getClasses());
        }
        if ($this->getId()) {
            $attributes["id"] = $this->addQuotes($this->getId());
        }
        return $attributes;
    }

}

?>
