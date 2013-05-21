<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'TemplateRegion.php';
global $schema;
$schema =
        array(
            array(
                "classes" => "show-grid",
                "regions" => array(
                    new TemplateRegion("header", 12, "", "header.php"))
            ),
            array(
                "classes" => "show-grid",
                "regions" => array(
                    new TemplateRegion("side-bar", 3, "", "sidebar.php"),
                    new TemplateRegion("content", 9, "", "content.php"))
            ),
            array(
                "classes" => "show-grid",
                "regions" => array(
                    new TemplateRegion("footer", 6, "", "footer.php"),
                    new TemplateRegion("social network", 6, "", "footer.php"))
            ),
);
?>
