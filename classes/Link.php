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

class Link extends IChildComponent {

    protected $href;
    protected $target;
            

    function __construct($href, $content = "", $id = "", $classes = "", $prepend = "", $append = "", $onclick = "", $target = "") {
        parent::__construct($id, $classes, $prepend, $append, "a", $onclick, $content);
        $this->href = $href;
        $this->taget = $target;
    }

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

    public function getHref() {
        return $this->href;
    }

    public function setHref($href) {
        $this->href = $href;
    }

    public function getTarget() {
        return $this->target;
    }

    public function setTarget($target) {
        $this->target = $target;
    }

}

?>
