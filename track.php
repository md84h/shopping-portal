<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
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
        ?>
    <div class="container">
            <div class="row" style="margin-top:10px">
            <?php
            include 'connect.php';
            $tid=$_POST['track'];
              $res=mysql_query("select item.item_id,item.check_id,item.item_name,item.image,shipment.track_id,shipment.item_id from item left join shipment on item.item_id=shipment.item_id where shipment.track_id='$tid'");
            //fetching the items and displaying them in most recent first
              if(!$res)
                  echo "correct";
            while($row=mysql_fetch_array($res))
            {
                $i_id=$row['item_id'];
                if($row['check_id']==1)
                {
                echo '<div class="col-sm-6 col-md-4">';
                echo '<div class="thumbnail">';
                echo "<img src='show.php?id=$i_id'/>";
                echo ' <div class="caption">';
                echo '<h3 align="center">'.$row["item_name"].'</h3>';
                echo '<p align="center">It will deliver in few days,keep checking</p>';
                echo '</div></div></div>';
              }  }         
            ?>  
        </div>
            </div>
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