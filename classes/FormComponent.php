<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Link
 *
 * @author xavier
 */
require_once 'IChildComponent.php';

abstract class FormComponent extends IChildComponent {

    protected $selector;
    protected $onblur;
    protected $onchange;
    protected $tooltip;
    protected $queryStringArray;
    protected $label;

    function __construct($label = "", $id = "", $selector = "", $queryStringArray = "", $prepend = "", $append = "", $tooltip = "", $classes = "", $content = "", $onblur = "", $onchange = "", $onclick = "") {
        parent::__construct($id, $classes, $prepend, $append, "", $onclick, $content);
        $this->label = $label;
        $this->selector = $selector;
        $this->queryStringArray = $queryStringArray;
        $this->tooltip = $tooltip;
        $this->onblur = $onblur;
        $this->onchange = $onchange;
    }

    /*
     *     protected $label;
      protected $id;
      protected $selector;
      protected $queryStringArray;
      protected $prepend;
      protected $append;
      protected $tooltip;
      protected $classes;
      protected $childComponents;
      protected $onblur;
      protected $onchange;
      protected $onclick;





      protected $tag;
      protected $render;
      protected $onload;
      protected $code;
     * 
     * 
     * 
     */

    protected function generateAttributes() {

        $attributes = parent::generateAttributes();
        if ($this->href) {
            $attributes["href"] = $this->addQuotes($this->href);
        } else {
            $attributes["href"] = $this->addQuotes("#");
        }
        if ($this->target) {
            $attributes["target"] = $this->addQuotes($this->getTaget());
        }
        return $attributes;
    }

    protected function generateCode() {

        if (empty($this->childComponents)) {
            $this->childComponents = $this->href;
        }
        return $this->generateGenericStartTag($this->generateAttributes()) . $this->generateChildCode() .
                $this->generateGenericEndTag();
    }

    public function getSelector() {
        return $this->selector;
    }

    public function setSelector($selector) {
        $this->selector = $selector;
    }

    public function getOnblur() {
        return $this->onblur;
    }

    public function setOnblur($onblur) {
        $this->onblur = $onblur;
    }

    public function getOnchange() {
        return $this->onchange;
    }

    public function setOnchange($onchange) {
        $this->onchange = $onchange;
    }

    public function getTooltip() {
        return $this->tooltip;
    }

    public function setTooltip($tooltip) {
        $this->tooltip = $tooltip;
    }

    public function getQueryStringArray() {
        return $this->queryStringArray;
    }

    public function setQueryStringArray($queryStringArray) {
        $this->queryStringArray = $queryStringArray;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

}

?>
