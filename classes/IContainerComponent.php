<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IContainerComponent
 *
 * @author xavier
 */
require_once 'IComponent.php';

abstract class IContainerComponent extends IComponent {

    protected $header;
    protected $columns;
    protected $externalResource;

    function __construct($header, $childComponents, $columns = 0, $id = "", $classes = "", $prepend = "", $append = "", $tag = "", $externalResource = "") {
        parent::__construct($id, $childComponents, $classes, $prepend, $append, $tag);
        $this->header = $header;
        $this->columns = $columns;
        $this->externalResource = $externalResource;
    }

    public function getHeader() {
        return $this->header;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function setColumns($columns) {
        $this->columns = $columns;
    }

    public function getExternalResource() {
        return $this->externalResource;
    }

    public function setExternalResource($externalResource) {
        $this->externalResource = $externalResource;
    }

    public function getClasses() {
        return TemplateRegion::GENERIC_REGION_CLASS . $this->columns . " " . $this->classes;
    }

}

?>
