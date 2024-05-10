<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dylan Rhymaun</title>
    <meta name="author" content="Dylan Rhymaun">
    <meta name="description" content="A personal art portfolio for Dylan Rhymaun.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/custom.css?version=<?php print time(); ?>"
        rel = "stylesheet"
        type = "text/css">

    <link href="css/layout-desktop.css?version=<?php print time(); ?>"
        media = "(min-width: 866px)"
        rel = "stylesheet"
        type = "text/css">
<!--
    <link href="css/layout-tablet.css?version=<?php print time(); ?>"
        media = "(max-width: 820px)"
        rel = "stylesheet"
        type = "text/css">
-->
    <link href="css/layout-phone.css?version=<?php print time(); ?>"
        media = "(max-width: 865px)"
        rel = "stylesheet"
        type = "text/css">


</head>
<?php
print '<body class="' . $pathParts['filename'] .'">';
?>
