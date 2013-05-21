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
require_once 'IChildComponent.php';

class ListItem extends IChildComponent {

    protected $type;

    function __construct($content, $type = "ul", $id = "", $classes = "", $prepend = "", $append = "", $onclick = "") {
        parent::__construct($id, $classes, $prepend, $append, $type, $onclick, $content);
    }

    protected function generateCode() {
        return $this->generateGenericStartTag($this->generateAttributes()) . $this->generateChildCode() .
                $this->generateGenericEndTag();
    }

    protected function generateChildCode() {
        if (is_string($this->childComponents)) { //Si childComponents es un String 
            return $this->childComponents;
        }
        $content = "";
        if (is_array($this->childComponents)) { //Si childComponents es array
            foreach ($this->childComponents as $child) {
                $content.="<li>";
                if (is_subclass_of($child, 'IComponent')) { //Si es un array de IComponent
                    $content.=$child->renderCode();
                } elseif (is_string($child)) { //Si es un array de string
                    $content.=$child;
                }
                $content.="</li>";
            }
        } elseif (is_subclass_of($this->childComponents, 'IComponent')) { //Si childComponents es IComponent
            $content.="<li>";
            $content.=$this->childComponents->renderCode();
            $content.="</li>";
        }
        return $content;
    }

    protected function generateAttributes() {

        return parent::generateAttributes();
    }

}

?>
