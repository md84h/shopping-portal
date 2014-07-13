<?php
$ipriceErr = $sizeErr =$inameErr=$catErr="";
$new_iprice=$new_size=$new_iname=$new_cat="";
session_start();
include ('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    if (empty($_POST["item_name"])) {
        $inameErr = "Please enter item name";
    } else {
        $new_iname = mysql_real_escape_string($_POST['item_name']);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["item_price"]))
    {
        $ipriceErr="Please enter base price";
    }
    else
    {
        $new_iprice = mysql_real_escape_string($_POST['item_price']);
    }
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["size"]))
    {
        $sizeErr="Please enter size";
    }
    else
    {
        $new_size = mysql_real_escape_string($_POST['size']);
    }       
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["category"]))
    {
        $catErr="Please select Category";
    }
    else
    {
        $new_cat = mysql_real_escape_string($_POST['category']);
    }
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
   $fileName=  mysql_real_escape_string($_FILES['userfile']['name']);
   $content=  mysql_real_escape_string(file_get_contents($_FILES['userfile']['tmp_name']));
   $type=  mysql_real_escape_string($_FILES['userfile']['type']);
   if(substr($type,0,5)=='image')
   {
       //echo "correct";
   }
   else
   {
       //echo "wrong";
   }
}
$date = date_default_timezone_set('Asia/Kolkata');    
$new_datetime = date('y/m/d h:i:s',time());
if(!$inameErr && !$ipriceErr && !$sizeErr && !$catErr)
{
if ($_SERVER['REQUEST_METHOD'] == 'POST')      //inserting into table
    {
    $ask = mysql_query("insert into item (item_name,item_price,size,category,date,file_name,image) values ('$new_iname','$new_iprice','$new_size','$new_cat','$new_datetime','$fileName','$content')");
    if (!$ask)
        echo "i will not allow you";
    else {
        header('location:home.php');
    }
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add</title>
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
          header('location:home.php');
        }
        ?>
            <div class="container">
            <div class="row" style="margin-top:10px">
        <div class="col-sm-8 col-md-8">
            <div class="container">
       <form class="form-signin" role="form" action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="item_name" class="form-control" value="<?php if(isset($new_iname) && !$inameErr) echo $new_iname;?>" maxlength="255" placeholder="Item Name" required><br>
                <?php
                            if($inameErr)
                            {
                                echo "<span class='help-block' style='color:red'>".$inameErr."</span>";
                                
                            }
                            ?>
                <input type="text" name="item_price" class="form-control" value="<?php if(isset($new_iprice) && !$ipriceErr) echo $new_iprice;?>" maxlength="255" placeholder="Cost" required><br>
                <?php
                            if($ipriceErr)
                            {
                                echo "<span class='help-block' style='color:red'>".$ipriceErr."</span>";
                                
                            }
                            ?>
                            <input type="text" name="size" class="form-control" value="<?php if(isset($new_size) && !$sizeErr) echo $new_size;?>" placeholder="Size" required><br>
                <?php
                            if($sizeErr)
                            {
                                echo "<span class='help-block' style='color:red'>".$sizeErr."</span>";
                                
                            }
                            ?>
                            <select name="category" class="form-control">
                                <option value>Category</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Kids">Kids</option>
                            </select>
                             <?php
                            if($catErr)
                            {
                                echo "<span class='help-block' style='color:red'>".$catErr."</span>";
                            }
                            ?>
                            <br>
                <input name="userfile" type="file" id="userfile" class="form-control" placeholder="Item pic" required><br>
                       <button class="btn btn-lg btn-primary btn-block" type="submit" style="background: #009999;">Add</button>
         </form>
            </div>
        </div>
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