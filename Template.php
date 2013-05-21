<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ITemplate
 *
 * @author xavier
 */
require_once 'TemplateSchema.php';
require_once 'TemplateRow.php';
require_once 'TemplateRegion.php';

class Template {

    protected $rows;
    protected $recordedContent;
    protected $findedRegion;
  

    function __construct($templateSchema) {
        include_once $templateSchema;
        $this->generateSchema();
    }

    public function findRegion($regionName) {

        if (!empty($this->rows) && is_array($this->rows)) {

            foreach ($this->rows as $row) {

                $findedRegion = TemplateRegion::compareName($regionName, $row->getRegions());

                if (isset($findedRegion)) {
                    return $findedRegion;
                }
            }
        }
        return NULL;
    }

    public function startRecording($regionName) {
        $this->findedRegion = $this->findRegion($regionName);
        if (isset($this->findedRegion)) {
            ob_start();
        }
    }

    public function stopRecording() {
        $this->findedRegion->setContent(ob_get_contents());
        ob_end_clean();
    }

    public function stopAndPrint() {
        $this->stopRecording();
        $this->printContent();
    }

    private function printContent() {
        echo TemplateRow::generateArrayCode($this->rows);
    }

    public function generateSchema() {
        global $schema;

        $this->rows = array();

        if (!empty($schema) && is_array($schema)) {

            foreach ($schema as $rowItem) {
                $this->rows[] = new TemplateRow($rowItem['regions'], $rowItem['classes']);
            }
        }
    }

    public function getRecordedContent() {
        return $this->recordedContent;
    }

    public function setRecordedContent($recordedContent) {
        $this->recordedContent = $recordedContent;
    }


}

?>
