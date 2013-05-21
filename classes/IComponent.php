<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Component
 *
 * @author xavier
 */
abstract class IComponent {

    protected $id;
    protected $classes;
    protected $prepend;
    protected $append;
    protected $tag;
    protected $render;
    protected $code;
    protected $childComponents;
    protected $onload;

    protected abstract function generateCode();

    function __construct($id, $childComponents, $classes, $prepend, $append, $tag) {
        $this->id = $id;
        $this->classes = $classes;
        $this->prepend = $prepend;
        $this->append = $append;
        $this->tag = $tag;
        $this->render = true;
        $this->childComponents = $childComponents;
    }

    function renderCode() {
        if ($this->render) {
            return $this->prepend . $this->generateCode() . $this->append;
        }
    }

    public function generateGenericStartTag($attributesArray = NULL) {
        $result = '<' . $this->tag . ' ';
        if (isset($attributesArray) && is_array($attributesArray)) {
            foreach ($attributesArray as $attributeName => $attributeValue) {
                $result .=(string) $attributeName . '=' . (string) $attributeValue;
            }
        }
        $result.='>';
        return $result;
    }

    public function generateGenericEndTag() {
        return "</$this->tag >";
    }

    public function addQuotes($string) {
        return "\"$string\"";
    }

    protected function generateAttributes() {
        $attributes = Array();
        if ($this->classes) {
            $attributes["class"] = $this->addQuotes($this->classes);
        }
        if ($this->id) {
            $attributes["id"] = $this->addQuotes($this->id);
        }
        return $attributes;
    }

    protected function generateChildCode() {
        if (is_string($this->childComponents)) {
            return $this->childComponents;
        }
        $content = "";
        if (is_array($this->childComponents)) {

            foreach ($this->childComponents as $child) {
                if (is_subclass_of($child, 'IComponent')) {
                    $content.=$child->renderCode();
                } elseif (is_string($child)) {
                    $content.=$child;
                }
            }
        } elseif (is_subclass_of($this->childComponents, 'IComponent')) {
            $content.=$this->childComponents->renderCode();
        }
        return $content;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getClasses() {
        return $this->classes;
    }

    public function setClasses($classes) {
        $this->classes = $classes;
    }

    public function getPrepend() {
        return $this->prepend;
    }

    public function setPrepend($prepend) {
        $this->prepend = $prepend;
    }

    public function getAppend() {
        return $this->append;
    }

    public function setAppend($append) {
        $this->append = $append;
    }

    public function getRender() {
        return $this->render;
    }

    public function setRender($render) {
        $this->render = $render;
    }

    public function getChildComponents() {
        return $this->childComponents;
    }

    public function setChildComponents($childComponents) {
        $this->childComponents = $childComponents;
    }

    public function getOnload() {
        return $this->onload;
    }

    public function setOnload($onload) {
        $this->onload = $onload;
    }

}

?>
