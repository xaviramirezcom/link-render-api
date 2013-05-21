<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap 101 Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="css/docs.css" rel="stylesheet" media="screen">
        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php
        include_once 'Template.php';
        include_once 'classes/FieldSet.php';
        include_once 'classes/Link.php';
        include_once 'classes/ListItem.php';

        $template = new Template("TemplateSchema.php");
        $template->startRecording("content");
        $link = new Link("google.com");
        $fielset = new FieldSet("Hola fieldset", array($link));
        $listItem = new ListItem(array($fielset, $fielset, $fielset), "ul"); {
            $listItem2 = new ListItem(array("hola", "como", "estas"), "ol");
        }

        $fielset2 = new FieldSet("Hola asd", $listItem, 8);
        $fielset3 = new FieldSet("", $listItem2, 4);
        echo $fielset2->renderCode();
        echo $fielset3->renderCode();
        $template->stopAndPrint();
        ?>
    </body>
</html>