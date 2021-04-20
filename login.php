<?php include 'conn.php';?>
<?php
    session_start();
    error_reporting( error_reporting() & ~E_NOTICE );
    $message = "";

    if(isset($_POST['submit'])){
        $result = mysqli_query($conn,"SELECT * FROM login_user
        WHERE username ='". $_POST["username"]  . "'
        and password = '" . $_POST["password"]."'");
        $row = mysqli_fetch_array($result);
        if($row>1){
            $_SESSION["id"] = $row['userID'];
            $_SESSION["name"] = $row['username'];
        } else {
            $message = "Invalid Username or Password!";
        }
    }
    $_SESSION['login'] = $_POST['username'];
    if (isset($_SESSION["id"])) {
        header("Location:listofbook2.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>

<body>
      <form  method="post" action="#" align="center">
      <div class="message"><?php if ($message!="")  {echo $message;}?>
      </div>

      <h3 align ="center">Enter Login Details</h3>
      Username:<br>
      <input type="text" name="username"><br>
      Password:<br>
      <input type="password" name="password">
      <br><br>
      <input type="submit" name="submit" value="Submit">
      <input type="reset">
      </form>

</body>

</html>