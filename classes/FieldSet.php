<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FieldSet
 *
 * @author xavier
 */
require_once 'IContainerComponent.php';

class FieldSet extends IContainerComponent {

    public function __construct($header, $childComponents, $columns = 0, $id = "", $classes = "", $prepend = "", $append = "", $externalResource = "") {
        $columnClass = "";
        if ($columns != 0) {
            $columnClass = "span" . $columns . " ";
        }

        parent::__construct($header, $childComponents, $columns, $id, $columnClass . $classes, $prepend, $append, "div", $externalResource);
    }

    protected function generateCode() {
        $fieldSetStart = !empty($this->header) ? "<fieldset><legend>$this->header</legend>" : "";
        $fieldSetEnd = !empty($this->header) ? "</fieldset>" : "";
        return $this->generateGenericStartTag($this->generateAttributes()) . $fieldSetStart . $this->generateChildCode() .
                $fieldSetEnd . $this->generateGenericEndTag();
    }

    protected function generateAttributes() {

        return parent::generateAttributes();
    }

}

?>
