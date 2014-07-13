<?php
include 'connect.php';
session_start();
$i_id=$_GET['id'];
$del=  mysql_query("delete from item where item_id='$i_id'");
if(!$del)
{
    echo "something went wrong";
}
else
{
    header('location:home.php');
}
?>