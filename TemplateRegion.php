<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TemplateRegion
 *
 * @author xavier
 */
class TemplateRegion {

    protected $columns;
    protected $content;
    protected $classes;
    protected $name;
    protected $view;
    protected $show;

    const GENERIC_REGION_CLASS = "span";

    function __construct($name, $columns, $classes, $view = NULL) {
        $this->columns = $columns;
        $this->classes = $classes;
        $this->name = $name;
        $this->view = $view;
    }

    public function generateCode() {
        return "<div class=\"" . self::GENERIC_REGION_CLASS . $this->columns . " " . $this->classes . "\">" . $this->content . "</div>";
    }
    
    public static function generateArrayCode($regionsArray) {
        $result = "";
        if (!empty($regionsArray) && is_array($regionsArray)) {
            foreach ($regionsArray as $region) {
                $result.=$region->generateCode();
            }
        }
        return $result;
    }

    public static function compareName($name, $regionsArray) {
        
        if (!empty($regionsArray) && is_array($regionsArray)) {
            foreach ($regionsArray as $region) {
                if (strcmp($name, $region->getName()) == 0) {
                    return $region;
                }
            }
        }
        return NULL;
    }

    public function getColumns() {
        return $this->columns;
    }

    public function setColumns($columns) {
        $this->columns = $columns;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getClasses() {
        return $this->classes;
    }

    public function setClasses($classes) {
        $this->classes = $classes;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getShow() {
        return $this->show;
    }

    public function setShow($show) {
        $this->show = $show;
    }

    public function getView() {
        return $this->view;
    }

    public function setView($view) {
        $this->view = $view;
    }

}

?>
