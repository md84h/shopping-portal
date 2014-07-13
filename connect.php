<?php
$con=mysql_connect("localhost", "root", "");
if(!$con)
        header("location:index.php");
if(!mysql_select_db("shopping_portal"))
    header("location:index.php");
?>
