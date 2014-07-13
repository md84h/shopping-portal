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
                if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']==true && $_SESSION['user_name']=='admin1')
                echo '<a  class="btn btn-success" href="add.php" style="font-size:20px; width:200px;">Add an Item</a>';
                echo '<br><br>';
                ?>
            <?php
            include 'connect.php';
            echo '<form class="form-inline" role="form" action="sort.php" method="POST">
                <div class="form-group">
                <select name="sort1" class="form-control" style="width:140px" required>
                                <option value>Sort Category</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Kids">Kids</option>
                            </select>
            <select name="sort2" class="form-control" style="width:140px" required>
                                <option value>On</option>
                                <option value="low_price">Low Price</option>
                                <option value="high_price">High Price</option>
                                <option value="new">New Arrival</option>
                            </select>
                            </div>
                            <button class="btn btn-default" type="submit">Sort</button>
            </form><br>';
            $sort=$_POST["sort1"];
            if($_POST['sort2']=='low_price')
              $res=mysql_query("select item_id,check_id,item_name,item_price,date,category from item where category='$sort' order by item_price asc");
            else
                if($_POST['sort2']=='high_price')
                    $res=mysql_query("select item_id,check_id,item_name,item_price,date,category from item where category='$sort' order by item_price desc");
                else
                    $res=mysql_query("select item_id,check_id,item_name,item_price,date,category from item where category='$sort' order by date desc");
            //fetching the items and displaying them in most recent first
            while($row=mysql_fetch_array($res))
            {
                $i_id=$row['item_id'];
                if($row['check_id']==0)
                {
                echo '<div class="col-sm-6 col-md-4">';
                echo '<div class="thumbnail">';
                echo "<img src='show.php?id=$i_id'/>";
                echo ' <div class="caption">';
                echo '<h3 align="center">'.$row["item_name"].'</h3>';
                echo '<p align="center"><b>Cost:'.$row['item_price'].'</b></p>';
                echo '<p align="center">Category:'.$row['category'].'</p>';
                if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']==true && $_SESSION['user_name']=='admin1')
                    echo "<p align='center'><a href='delete.php?id=$i_id' class='btn btn-primary' role='button'>Remove</a></p>";
                else
                {
                if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']==true)
                echo "<p align='center'><a href='buy.php?id=$i_id' class='btn btn-primary' role='button'>Buy</a></p>";
                }
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