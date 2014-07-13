<?php
include 'connect.php';
$t_id=$_GET['id'];
$res=mysql_query("select track_id from shipment where item_id='$t_id'");
if(!$res)
{
    echo "error";}
while($row=  mysql_fetch_array($res))
{
    $track=$row['track_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Success</title>
    </head>
    <body>
        <?php
        
        echo '<h1 align="center">Your track id is '.$track.'</h1>';
        ?>
        <h2 align="center">
            Your Payment is made<br> Item will be delivered in 3 days<br> Thanks!!!<br> Go <a href="home.php">Home</a>
        </h2>
    </body>
</html>