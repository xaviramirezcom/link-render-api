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
require_once 'IComponent.php';

abstract class IChildComponent extends IComponent {

    protected $onclick;

    function __construct($id, $classes, $prepend, $append, $tag, $onclick, $content) {
        parent::__construct($id, $content, $classes, $prepend, $append, $tag);
        $this->onclick = $onclick;
        $this->content = $content;
    }

    protected function generateAttributes() {

        $attributes = parent::generateAttributes();
        if ($this->onclick) {
            $attributes["onclick"] = $this->addQuotes($this->onclick);
        }
        return $attributes;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

}

?>
