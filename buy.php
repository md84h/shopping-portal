<?php 
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Buy</title>
  <link href="sticky-footer.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrap">
        <?php
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']==true)
        {
            include 'header_signin.php';
        }
        else
        {
          include 'header_signout.php';
        }
        include 'connect.php';
        $name=$_GET['id'];
        $res=mysql_query("select item_id,item_name,item_price,category,size,date from item where item_id='$name'");
        while($row=mysql_fetch_array($res))
            {
                $i_id=$row['item_id'];
                echo '<div class="thumbnail">';
                echo "<img src='show.php?id=$i_id'/>";
                echo ' <div class="caption">';
                echo '<h3 align="center">'.$row["item_name"].'</h3>';
                echo '<p align="center"><b>Cost:'.$row['item_price'].'</b></p>';
                echo '<p align="center">Category:'.$row['category'].'</p>';
                echo '<p align="center"><b>Size:'.$row['size'].'</b></p>';
                echo "<p align='center'><a href='pay.php?id=$i_id' class='btn btn-primary' role='button'>Buy</a></p>";
                echo '</div></div>';
            }
                ?>
        </div>
        <div id="footer">
     <div class="container">
          <div id="list"> <ul>
              <li>About Us</li>
              <li>Contact Us</li>
              <li>Feedback</li>
          </ul>
          </div>
      </div>
        </div>
    </body>
</html>