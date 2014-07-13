<?php 
session_start(); 
include 'connect.php';
$nid=$_GET['id'];
$new_add=$new_name="";
$addErr=$nameErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    if (empty($_POST["name"])) {
        $nameErr = "Please enter name";
    } else {
        $new_name = mysql_real_escape_string($_POST['name']);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    if (empty($_POST["address"])) {
        $addErr = "Please enter address";
    } else {
        $new_add = mysql_real_escape_string($_POST['address']);
    }
}
$acc=$pin="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $acc=$_POST['account'];
    $pin=$_POST['pin'];
}
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{$res=mysql_query("select * from bank where account_no='$acc' and pin='$pin'");
if(mysql_num_rows($res)==0)
{
    $msg="Wrong Account No and Pin Code";
}
}
$new_item=$nid;
$new_user=$_SESSION['user_id'];
if(!$nameErr && !$addErr && !$msg)
{
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $res=mysql_query("insert into shipment (user_id, name, address, item_id) values ('$new_user','$new_name','$new_add','$new_item')");
    if($res)
    {
        $i=1;
        $result=mysql_query("update item set check_id='$i' where item_id='$new_item'");
        if(!$result)
            echo "something wrong";
        else
        {
           header("location:success.php?id=$nid");
    }
    }
    else
    {
        echo "Unbale to Proceed,Sorry!!!";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pay</title>
  <link href="sticky-footer.css" rel="stylesheet">
        <link href="bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="signup.css"/>
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
            <h3 align="center">Delivery Details</h3>
            <div class="container">

      <form class="form-signin" role="form" action="" method="POST">
          <input type="text" class="form-control" name="name" placeholder="Name" required>
          <input type="text" class="form-control" name="contact" placeholder="Contact No" required>
          <textarea name="address" class="form-control" rows="3" cols="20" placeholder="Address" required></textarea>
          <h3 align="center">Payment</h3>
          <select name="p_mode" class="form-control" required>
              <option value>Payment Type</option>
              <option value="1">Credit Card</option>
              <option value="2">Debit card</option>
              <option value="3">Net Banking</option>
          </select>
          <input type="number" name="account" class="form-control" placeholder="Account No" required>
          <input type="password" name="pin" class="form-control" placeholder="Pin Number" required>
          <?php
          if($msg)
          {
              echo $msg;
          }
          ?>
          <button class="btn btn-lg btn-primary btn-block" type="submit" style="background: #009999;">Proceed</button>
      </form>
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
