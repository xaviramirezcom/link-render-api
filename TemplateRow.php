<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TemplateRow
 *
 * @author xavier
 */
require_once 'TemplateRegion.php';

class TemplateRow {

    protected $classes;
    protected $regions;
    protected $show;

    const GENERIC_ROW_CLASS = "row-fluid";

    function __construct($regions = NULL, $classes = NULL) {

        $this->classes = $classes;
        $this->regions = $regions;
    }

    public function generateCode() {
        return "<div class=\"" . self::GENERIC_ROW_CLASS . " " . $this->classes . "\">" . TemplateRegion::generateArrayCode($this->regions) . "</div>";
    }

    public static function generateArrayCode($rowArray) {
        
        $result = "";
        if (!empty($rowArray) && is_array($rowArray)) {
            foreach ($rowArray as $row) {
                $result.=$row->generateCode();
            }
        }
        return $result;
    }

    public function getClasses() {
        return $this->classes;
    }

    public function setClasses($classes) {
        $this->classes = $classes;
    }

    public function getRegions() {
        return $this->regions;
    }

    public function setRegions($regions) {
        $this->regions = $regions;
    }

    public function getShow() {
        return $this->show;
    }

    public function setShow($show) {
        $this->show = $show;
    }

}

?>
